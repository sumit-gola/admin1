<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menus;

class MenuManager extends Controller
{
    public function creaeTab(Request $request){
        
        Menus::create([
            'name' => $request->name,
          'slug' => $request->slug,
          'metadata' => $request->metadata
        ]);
    

    }
}
