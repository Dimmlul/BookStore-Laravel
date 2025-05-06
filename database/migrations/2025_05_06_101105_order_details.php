<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders'); // Foreign key ke tabel orders
            $table->foreignId('book_id')->constrained('books'); // Foreign key ke tabel books
            $table->integer('quantity'); // Jumlah buku yang dipesan
            $table->decimal('price', 8, 2); // Harga per buku
            $table->decimal('subtotal', 8, 2); // Subtotal untuk item tersebut (quantity * price)
            $table->timestamps(); // Timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
