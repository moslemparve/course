<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
class TaskController extends Controller
{
    public function index(){
        return view('about.about');
    }

    public function store(TaskRequest $request){
        Task::create($request->validated());
        return redirect()->back()->with('success', 'Task created successfully.');
    }
}
