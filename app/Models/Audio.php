<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'original_name',
        'renamed_name',
        'file_size',
        'file_type',
        'encryption_key',
        'decryption_key',
        'encrypted_text',
    ];
}
