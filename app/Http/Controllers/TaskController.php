<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
class TaskController extends Controller
{
    public function index(){
        // $tasks = Task::latest()->get(['title']);
        // $tasks = Task::where('id', '>', 2)->get();
        $tasks = Task::all();
        return view('about.about', compact('tasks'));
    }

    public function store(TaskRequest $request){
        Task::create($request->validated());
        return redirect()->back()->with('success', 'Task created successfully.');
    }
}
