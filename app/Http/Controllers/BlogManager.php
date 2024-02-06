<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogManager extends Controller
{
    public function singleUser(string $id){
        $users = DB::table('pages')->where('id',$id)->get();
       
        return view('pages.blogs.blogdetails',['data' => $users]);
     }

     public function allBlogs(){
        $users = DB::table('pages')->get();
        return view('pages.blogs.allblogs')->with('data',$users);
     }

}
