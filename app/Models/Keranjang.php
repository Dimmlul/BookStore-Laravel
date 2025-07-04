<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjangs';

    protected $fillable = ['user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isiKeranjang()
    {
        return $this->hasMany(IsiKeranjang::class);
    }
}
