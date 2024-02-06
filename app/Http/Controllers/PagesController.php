<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;



class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.blogs.blogdetails');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
       
        $slug = Str::of( $request->slug)->slug('-');
        $content =  Pages::create([
            'title' => $request->title,
            'slug' =>$slug,
            'content' =>$request->page_data,
            'meta_title' => 'meta-title',
            'meta_keywords' =>'meta_keywords',
            'meta_description' =>'meta-description'
            

        ]);
        if($content){
            return response()->json(
              ['formdata' => $content,
               'status' => 200,
                'message' => 'Content Created Successfully',
                
                
              ]
            );

        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = DB::table('pages')->where('id',$id)->get();


        return view('pages.blogs.blogdetails',['blog_data'=>$users]);
        
    }
    public function singleUser(string $id){
        $users = DB::table('pages')->where('id',$id)->get();
        return view('pages.blogs.blogdetails', ['data' => $users ]);
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $pages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pages $pages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pages $pages)
    {
        //
    }
}
