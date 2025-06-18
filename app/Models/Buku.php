<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = ['judul', 'gambar', 'penulis', 'harga', 'bahasa', 'deskripsi', 'stok', 'ISBN', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function isiPesanan()
    {
        return $this->hasMany(IsiPesanan::class, 'buku_id');
    }

    public function isiKeranjang()
    {
        return $this->hasMany(IsiKeranjang::class, 'buku_id');
    }
}
