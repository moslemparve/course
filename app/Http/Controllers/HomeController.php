<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function index()
    {
        $studdent = Student::with('courses')->find(1);
        // $course = Course::with('students')->find(2);
        // $course->students->each->unsetRelation('pivot');

        // return $studdent;
        return view('home');
    }

    private function getCourseWithStudents(int $courseId): Course
    {
        return Course::with('students')->findOrFail($courseId);
    }
}
