<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function ShowAbout()
    {
        return view('roti.about');
    }
    
}
