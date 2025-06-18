<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = ['user_id', 'total_harga', 'metode_pembayaran', 'bukti_pembayaran', 'status', 'dibuat_pada', 'dikonfirmasi_pada'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isiPesanan()
    {
        return $this->hasMany(IsiPesanan::class);
    }
}
