<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;  // Pastikan ini di-import
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;  

class User extends Authenticatable implements MustVerifyEmail, JWTSubject  // Implementasi JWTSubject
{
    use HasFactory, Notifiable, HasRoles;  // Gunakan trait HasRoles dari Spatie

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Method untuk mengembalikan ID pengguna untuk JWT
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();  // Biasanya ini mengembalikan ID pengguna
    }

    /**
     * Method untuk mengembalikan klaim kustom untuk JWT (bisa dikosongkan atau disesuaikan)
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
