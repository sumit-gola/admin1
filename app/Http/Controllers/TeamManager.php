<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\team;
use Illuminate\Support\Str;

class TeamManager extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/pages/menu',['datas' => team::orderBy('id','desc')->get()]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $TeamMember = team::get();
        return response()->json($TeamMember);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
 
        $slug = Str::of( $request->designation)->slug('-');
        $user =  team::create([
            'name' => $request->name,
            'description' =>$slug,
            

        ]);
        if($user){
            return response()->json(
              ['formdata' => $user,
               'status' => 200,
                'message' => 'User Created Successfully',
                
                
              ]
            );

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = team::find($id);
        $user->name = $request->name;
        $user->description = $request->slug;
        $user->save();
        return response()->json(
            [   
                'formdata' => $user,
                'status' => 200,
                'message' => 'User update Successfully',
            ]   
        ); 

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user by id
        $user = team::find($id);
        // Delete the user from the database
        $user->delete();
        return response()->json(
          [
          'status' => 200,
           'message' => 'User Deleted Successfully',
          ]);
        
    }
}
