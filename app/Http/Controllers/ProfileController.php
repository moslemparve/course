<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Auth;
class ProfileController extends Controller
{
    public function show(){
        $profile = Auth::user()->profile;
        return view('users.profile',compact('profile'));
    }

    public function update(Request $request){
        Auth::user()->profile->update([
            'contact' => $request->contact,
            'user_name' =>$request->user_name,
            'age'=>$request->age
        ]);

        return redirect()->route('users.profile')->with('success', 'Profile updated successfully.');

    }
}
