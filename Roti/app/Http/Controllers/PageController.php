<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Method untuk halaman index
    public function index()
    {
        return view('roti.index');
    }

    // Method untuk halaman about
    public function about()
    {
        return view('roti.about');
    }

    // Method untuk halaman menu
    public function menu()
    {
        return view('roti.menu');
    }

    // Method untuk halaman contact
    public function contact()
    {
        return view('roti.contact');
    }

}
