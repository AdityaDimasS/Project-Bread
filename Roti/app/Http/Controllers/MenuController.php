<?php

namespace App\Http\Controllers;

use App\Models\Menu;  // Pastikan model Menu sudah ada
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function showMenu()
    {
        // Mengambil semua data menu dari database
        $menus = Menu::all();

        // Mengirimkan data menus ke view
        return view('roti.menu', compact('menus'));
    }
    public function index()
    {
        return view('menu.index'); // Ganti 'menu.index' dengan nama view Anda
    }
}
