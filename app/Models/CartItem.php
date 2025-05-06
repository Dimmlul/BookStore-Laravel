<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'book_id',
        'jumlah',
        'subtotal',
    ];

    // Relasi Many-to-One dengan Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Relasi Many-to-One dengan Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
