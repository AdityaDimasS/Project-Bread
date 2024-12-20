<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function ShowContact()
    {
        return view('roti.contact'); // Ganti 'home' dengan nama file view Anda di folder 'resources/views'
    }
}
