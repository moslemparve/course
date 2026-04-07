<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Task};
use App\Http\Requests\TaskRequest;
use Auth;
class TaskController extends Controller
{
    public function index(){
        $tasks = Task::with(['user'])->get();
        // $tasks = Task::where('id', '>', 2)->get();
        // $tasks = User::with(['profile','tasks'])->get();
        // return $tasks;
        return view('tasks.index', compact('tasks'));
    }


    public function create(){
        return view('tasks.create');
    }
    public function store(TaskRequest $request){ // dependency injection

        Auth::user()->tasks()->create($request->validated());
        // dd(Auth::user());
        // Task::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'user_id' => Auth::id(),
        // ]);
        return redirect()->back()->with('success', 'Task created successfully.');
    }

    public function edit($id){
        $task = Task::findOrFail($id); // if not found, it will throw a 404 error
        // $task = Task::find($id); // if not found, it will return null
        // $task = Task::where('id', $id)->first(); // if not found, it will return null
          return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, $id){
        dd($request->storeOrUpdate());

         $data = [
        'title' => $request->title,
        'description' => $request->description,
    ];
        $task = Task::findOrFail($id);

    // Check if a new image is uploaded
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = time() . '-' . $image->getClientOriginalName();
        $destinationPath = public_path('uploads/tasks');

        // Move new image
        $image->move($destinationPath, $fileName);

        // Optional: delete old image
        if ($task->image && file_exists($destinationPath . '/' . $task->image)) {
            unlink($destinationPath . '/' . $task->image);
        }

        $data['image'] = $fileName;
    }

    // Update task
    $task->update($data);
        // $task->update($request->validated());
        return redirect()->back()->with('success', 'Task updated successfully.');
    }

    public function show($id){
        $task = Task::findOrFail($id)->with('user')->first();
        // return $task;
        return view('tasks.show', compact('task'));
    }   
    public function destroy($id){
        $task = Task::find($id)->delete();
        // $task->delete();
        return redirect()->back()->with('success', 'Task deleted successfully.');
    }

    public function search(Request $request){
        $search = $request->query('search_task');
        $tasks = Task::with('user')->where('title', 'like', '%' . $search . '%')->get();
        return response()->json( $tasks);
    }
}
