<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = [];
        $allUsers = User::all(); // Find the resource by its ID, throwing a 404 error if not found
        return view('dashboard', compact('allUsers', 'results')); // Pass the retrieved resource to a view for display
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->input('query');

        $allUsers = User::all();
        $results = User::find($id); // Find the resource by its ID, throwing a 404 error if not found
        return view('dashboard', compact('allUsers','results')); // Pass the retrieved resource to a view for display
    }

    public function update(Request $request, $id)
    {
 
        $user = User::findOrFail($id);
        $new_points = $user->points + $request->input('weight');
        $user->points = $new_points;

        $user->save();

        $allUsers = User::all();
        $results = $user; // Find the resource by its ID, throwing a 404 error if not found
        return view('dashboard', compact('allUsers','results')); // Pass the retrieved resource to a view for display
    }
}