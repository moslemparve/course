<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function index()
    {
        $student = Student::with('courses')->find(1);
        return $student;
        return view('home');
    }
}
