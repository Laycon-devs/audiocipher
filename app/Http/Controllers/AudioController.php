<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Auth;

class AudioController extends Controller
{
    public function encrypt(Request $request)
{
    $request->validate([
        'audio' => 'required|max:20480',
        'message' => 'required|string|max:5000'
    ]);

    $file = $request->file('audio');
    $originalName = $file->getClientOriginalName();

    // Check if the audio already exists
    $audioExists = Audio::where('original_name', $originalName)->exists();
    if ($audioExists) {
        return back()->withErrors(['audio' => 'File has already been used to encrypt an information.']);
    }

    $fileType = $file->getClientMimeType();
    $fileSize = $file->getSize();
    $newFileName = 'AudioCipher_' . uniqid() . '.' . $file->getClientOriginalExtension();

    // Move the uploaded file
    $file->move(public_path('uploads'), $newFileName);

    // Generate encryption and decryption keys
    $encryptionKey = strtoupper(implode('-', str_split(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 12), 4)));
    $decryptionKey = bin2hex(random_bytes(16));
    $sanitizedKey = str_replace('-', '', $encryptionKey);

    // Generate a valid 16-byte IV
    $iv = substr(hash('sha256', $sanitizedKey), 0, 16);

    $encryptedText = openssl_encrypt(
        $request->message,
        'AES-256-CBC',
        $sanitizedKey,
        0,
        $iv
    );

    // Save to database
    $audio = Audio::create([
        'user_id' => Auth::id(),
        'original_name' => $originalName,
        'renamed_name' => $newFileName,
        'file_size' => $fileSize,
        'file_type' => $fileType,
        'encryption_key' => $encryptionKey,
        'decryption_key' => $decryptionKey,
        'encrypted_text' => $encryptedText,
    ]);

    return redirect()
        ->route('encrypted', ['id' => $audio->id])
        ->with('success', 'Audio encrypted successfully! Download and share the details.');
}

    public function showEncrypted($id)
    {
        $audio = Audio::findOrFail($id);

        return view('encrypted', [
            'audio' => $audio,
            'downloadUrl' => url('uploads/' . $audio->renamed_name),
            'successMessage' => session('success')
        ]);
    }

    public function currentUserEncrypt()
    {
        $currentUserFile = Audio::where('user_id', '=', Auth::id())->get();
        // dd($currentUserFile);
        return view('dashboard', compact('currentUserFile'));
    }

    public function decrypt(Request $request)
    {
        // Validate the input
        $request->validate([
            'audio' => 'required|max:20480',
            'decryption_key' => 'required|string',
            'encryption_key' => 'required|string',
        ]);

        // Handle the uploaded file
        $file = $request->file('audio');
        $fileName = $file->getClientOriginalName();

        // Find the matching audio record
        $audio = Audio::where('renamed_name', $fileName)->first();

        if (!$audio) {
            return back()->withErrors(['audio' => 'Invalid or unmatched audio file.']);
        }

        // Validate the decryption key
        if ($audio->decryption_key !== $request->decryption_key) {
            return back()->withErrors(['decryption_key' => 'Invalid decryption key.']);
        }elseif ($audio->encryption_key !== $request->encryption_key) {
            return back()->withErrors(['encryption_key' => 'Invalid encryption key.']);
        }

        // Decrypt the message
        $decryptedMessage = openssl_decrypt(
            $audio->encrypted_text,
            'AES-256-CBC',
            str_replace('-', '', $audio->encryption_key),
            0,
            substr(hash('sha256', str_replace('-', '', $audio->encryption_key)), 0, 16)
        );
        $decryptedMessageHtml = Markdown::parse($decryptedMessage);
        // dd($decryptedMessage);
        return view('decrypted', [
            'audio' => $audio,
            'decryptedMessage' => $decryptedMessage,
            'decryptedMessageHtml' => $decryptedMessageHtml,
        ]);
    }
}
