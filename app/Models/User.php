<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // Relasi One-to-One dengan Cart
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    // Relasi One-to-Many dengan Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relasi One-to-Many dengan Message
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
