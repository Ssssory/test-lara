<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTasks()
    {
        $tasks = Task::all();
        return view('tasks',[
            'tasks' => $tasks
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name
        ]);
        return redirect('/tasks');
    }

    public function delete(Request $request, $id)
    {
        $task = Task::find($id);

        $task->delete();

        return redirect('/tasks');
    }
}
