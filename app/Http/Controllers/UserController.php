<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        $allUsers = User::with('postalCode')->get(); 
        // foreach ($allUsers as $user) {
        //     if ($user->postalCode) {
        //         // Postal code details are available
        //        dd($user->postalCode->code);
        //         // Use $postalCodeDetails as needed
        //     } else {
        //         // Postal code details are not available
        //     }
        // }
 
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
        $id_number = $request->input('query');

        $allUsers = User::all();
        $userById = User::where('id_number', $id_number)->get(); // Find the resource by its ID, throwing a 404 error if not found
        return view('dashboard', compact('allUsers','userById')); // Pass the retrieved resource to a view for display
    }

   
    public function search(Request $request)
    {
        $id_number = $request->input('query');
        $allUsers = User::all();
        $userById = User::where('id_number', $id_number)->first(); // Find the resource by its ID, throwing a 404 error if not found
        
        return view('dashboard', compact('allUsers','userById')); // Pass the retrieved resource to a view for display
    }
    
    public function update(Request $request, $id)
    {
 
        $user = User::findOrFail($id);
        $new_points = $user->points + $request->input('weight');
        $user->points = $new_points;

        $user->save();

        $allUsers = User::all();
        $userById = $user; // Find the resource by its ID, throwing a 404 error if not found
        return view('dashboard', compact('allUsers','userById')); // Pass the retrieved resource to a view for display
    }

    public function localShopUpdate(Request $request, $id)
    {
 
        $seller = Auth::user();

        $buyer = User::where('id', $id)->where('user_type', 'pb')->first();

        if (!$buyer) {
            throw new \Exception('Buyer not found.');
        }
    
        $new_seller_points = $seller->points - ($request->input('weight') / 50);
        $new_buyer_points = $buyer->points + ($request->input('weight') / 50);

        $seller->points = $new_seller_points;
        $buyer->points = $new_buyer_points;

        $seller->save();
        $buyer->save();

        $allUsers = User::all();
        $userById = $buyer; // Find the resource by its ID, throwing a 404 error if not found
        return view('dashboard', compact('allUsers')); // Pass the retrieved resource to a view for display
    }
}