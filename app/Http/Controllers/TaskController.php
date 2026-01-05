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
        return view('tasks.index', compact('tasks'));
    }


    public function create(){
        return view('tasks.create');
    }
    public function store(TaskRequest $request){

        $image = $request->file('image'); // get file 
        $fileName = time().'-'.$image->getClientOriginalName(); // get file name
        // $fileName = time().'-'.$image->getClientOriginalExtention(); // get file extention
        $destinationPath = public_path('uploads/tasks'); // define uplod directory public_path to access public folder
         $image->move($destinationPath, $fileName); // file store in folder

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName
        ]);
        return redirect()->back()->with('success', 'Task created successfully.');
    }

    public function edit($id){
        $task = Task::findOrFail($id); // if not found, it will throw a 404 error
        // $task = Task::find($id); // if not found, it will return null
        // $task = Task::where('id', $id)->first(); // if not found, it will return null
          return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, $id){
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    public function show($id){
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }   
    public function destroy($id){
        $task = Task::find($id)->delete();
        // $task->delete();
        return redirect()->back()->with('success', 'Task deleted successfully.');
    }
}
