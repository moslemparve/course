<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
class AboutController extends Controller
{
    public function index(){
        $name = 'Muslim Hasan';
        $age = 24;
        return view('about.about', compact('name', 'age'));
    }

    public function store(AboutRequest $request){
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'age' => 'required|integer|min:0',
        // ]);
        $name = $request->name;
        $age = $request->age;
        return redirect()->back()->with('success', 'Data received: Name - ' . $name . ', Age - ' . $age);
    }
}
