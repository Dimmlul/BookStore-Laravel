<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('judul'); // Judul buku
            $table->string('penulis'); // Penulis buku
            $table->decimal('harga', 8, 2); // Harga buku disimpan sebagai decimal
            $table->integer('stok'); // Stok buku
            $table->text('deskripsi')->nullable(); // Deskripsi buku (optional)
            $table->foreignId('kategori_id')->constrained('categories'); // Foreign key ke tabel categories
            $table->string('gambar')->nullable(); // Path gambar buku (optional)
            $table->timestamps(); // Timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
