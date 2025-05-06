<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('cart_id')->constrained('carts'); // Foreign key ke tabel carts
            $table->foreignId('book_id')->constrained('books'); // Foreign key ke tabel books
            $table->integer('quantity'); // Jumlah buku yang ditambahkan ke keranjang
            $table->decimal('subtotal', 8, 2); // Subtotal harga disimpan sebagai decimal
            $table->timestamps(); // Timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
