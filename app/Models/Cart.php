<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'status'
    ];

    // Relasi Many-to-One dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi One-to-Many dengan CartItem
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Relasi One-to-One dengan Order
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
