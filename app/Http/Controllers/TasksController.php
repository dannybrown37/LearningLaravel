<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); // Eloquent model usage
        return view('tasks.task_index', compact('tasks'));
    }

    public function show(Task $task)
    {
        // We don't need the next line due to route-model binding.
        // $task = Task::find($id); // Eloquent model usage
        return view('tasks.view_task', compact('task'));
    }

    public function api()
    {
        $tasks = DB::table('tasks')->get(); // Not eloquent model usage
        return $tasks;
    }

    /*
    public function api_show($id)
    {
        $task = Task::find($id);
        return $task;
    }
    */

    // The below is an example of route-model binding.
    // It is identical to the above, commented-out code.
    // Requirement for route-model binding:
    //   -- The variable name must match up with the wildcard in the route.
    //   -- Laravel will assume it's looking for primary key.
    //   ----> We can, however, change this to look for something else. 
    public function api_show(Task $task) // Task::find(wildcard)
    {
        return $task;
    }

    public function about()
    {
        return view('about');
    }
}
