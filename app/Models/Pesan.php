<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'pesan';

    protected $fillable = ['user_id', 'subjek', 'isi', 'status', 'dikirim_pada', 'dibalas_pada'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
