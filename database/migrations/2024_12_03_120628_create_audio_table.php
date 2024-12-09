<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audio', function (Blueprint $table) {
            $table->id();
            $table->string('original_name'); // Original audio file name
            $table->string('renamed_name'); // New unique file name
            $table->integer('file_size'); // File size in bytes
            $table->string('file_type'); // MIME type of the audio file
            $table->string('encryption_key'); // Key for encrypting the text
            $table->string('decryption_key'); // Key for decrypting the text
            $table->text('encrypted_text'); // The encrypted message embedded in the audio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audio');
    }
};
