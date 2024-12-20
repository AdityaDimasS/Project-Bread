<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    // Jika tabel Anda tidak memiliki nama tabel yang sesuai dengan konvensi Laravel
    protected $table = 'menus';

    // Jika Anda ingin mengisi properti mass assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    // Properti untuk SoftDeletes
    protected $dates = ['deleted_at'];
}
