<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'cart_id',
        'user_id',
        'alamat_pengiriman',
        'status',
        'metode_pembayaran'
    ];

    // Relasi Many-to-One dengan Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Relasi Many-to-One dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
