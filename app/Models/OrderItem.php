<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
        'price',
        'subtotal'
    ];

    // Relasi Many-to-One dengan Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi Many-to-One dengan Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
