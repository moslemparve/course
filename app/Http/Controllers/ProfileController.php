<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Auth;
class ProfileController extends Controller
{
    public function show(){
        // dd(Auth::user());
        $profile = Auth::user()->profile;
        // dd($profile);
        return view('users.profile',compact('profile'));
    }

    public function update(Request $request){
        Auth::user()->profile()->updateOrCreate(['user_id' => Auth::id() ],[
            'contact' => $request->contact,
            'user_name' =>$request->user_name,
            'age'=>$request->age
        ]);

        return redirect()->route('users.profile')->with('success', 'Profile updated successfully.');

    }
}
