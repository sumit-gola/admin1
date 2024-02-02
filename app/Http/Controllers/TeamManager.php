<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\team;

class TeamManager extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/pages/team',['datas' => team::get()]);
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
        $user =  team::create([
            'name' => $request->name,
            'description' => $request->designation,
            

        ]);
        if($user){
            return response()->json(
              [
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
