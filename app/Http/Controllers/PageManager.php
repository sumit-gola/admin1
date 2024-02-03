<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageManager extends Controller
{
    public function menu(){
        return view('dashboard.pages.menu');
    }
    
}
