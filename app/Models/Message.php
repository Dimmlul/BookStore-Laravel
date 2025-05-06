<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'subjek',
        'isi_pesan',
        'tanggal_kirim'
    ];

    // Relasi Many-to-One dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
