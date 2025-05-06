<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul',
        'penulis',
        'harga',
        'stok',
        'deskripsi',
        'kategori_id',
        'gambar'
    ];

    // Relasi Many-to-One dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    // Relasi One-to-Many dengan CartItem
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Relasi One-to-Many dengan OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
