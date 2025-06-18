<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiKeranjang extends Model
{
    use HasFactory;

    protected $table = 'isi_keranjangs';

    protected $fillable = ['keranjang_id', 'buku_id', 'jumlah', 'harga'];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
}
