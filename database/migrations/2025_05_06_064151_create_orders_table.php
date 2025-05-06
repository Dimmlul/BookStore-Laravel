<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('cart_id')->constrained('carts'); // Foreign key ke tabel carts
            $table->foreignId('user_id')->constrained('users'); // Foreign key ke tabel users
            $table->string('alamat_pengiriman'); // Alamat pengiriman
            $table->enum('status', ['pending', 'shipped', 'delivered', 'cancelled'])->default('pending'); // Status pesanan
            $table->enum('metode_pembayaran', ['COD', 'Cashless'])->default('COD'); // Metode pembayaran
            $table->timestamps(); // Timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
