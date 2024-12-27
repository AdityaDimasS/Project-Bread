<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda
    protected $table = 'menus';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['name', 'description', 'price', 'image'];

    // Mengizinkan pengaturan timestamps
    public $timestamps = true;  
}
