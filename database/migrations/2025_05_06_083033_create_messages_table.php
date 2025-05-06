<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained('users'); // Foreign key ke tabel users
            $table->string('subjek'); // Subjek pesan
            $table->text('isi_pesan'); // Isi pesan
            $table->timestamp('tanggal_kirim'); // Waktu pengiriman pesan
            $table->timestamps(); // Timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
