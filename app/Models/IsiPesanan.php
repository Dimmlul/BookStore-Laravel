<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiPesanan extends Model
{
    use HasFactory;
    protected $table = 'isi_pesanan';

    protected $fillable = ['pesanan_id', 'buku_id', 'jumlah', 'harga'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
