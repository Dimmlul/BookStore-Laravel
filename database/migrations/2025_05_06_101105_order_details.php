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
            $table->integer('jumlah'); // Jumlah buku yang dipesan
            $table->integer('harga'); // Harga per buku
            $table->integer('subtotal'); // Subtotal untuk buku (jumlah * harga)
            $table->timestamps(); // Timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
