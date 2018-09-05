<?php



use App\Task; // Allows us to refer to just Task rather than App\Task below

// After we've created tables in the database and added some data
Route::get('/', function () {
    $startDate = strtotime("2018/08/26");
    $now = time();
    $name = 'Dear Reader';
    $age = round(($now - $startDate) / (60 * 60 * 24));
    $tasks = DB::table('tasks')->get(); // This is laravel's query builder
    return view('welcome', compact('name', 'age', 'tasks'));
});

/* This is now handled below with app\Http\Controllers\TasksController.php
// Here are examples of routing to a view from the resources/views path
Route::get('/tasks', function () {
    // $tasks = DB::table('tasks')->get(); // SAME AS:
    $tasks = Task::all(); // Eloquent model usage
    return view('tasks.task_index', compact('tasks'));
});
*/

/*
In general, it's okay to store our controller logic directly in our routes
file for smaller projects. The goal is to keep things as simple as possible to
justify. However, for most projects, things will quickly get unwieldy. We
instead introduce controllers. Here's how we would rewrrite the /tasks route:
*/
Route::get('/tasks', 'TasksController@index');
// Controllers are kepts in app/Http/Controllers
// Controller generator:
//  php artisan make:controller TasksController

Route::get('/tasks/{task}', 'TasksController@show');

/* This is handled above using a controller
Route::get('/tasks/{task}', function ($id) {
    // $task = DB::table('tasks')->find($id); // SAME AS:
    $task = Task::find($id); // Eloquent model usage
    return view('tasks.view_task', compact('task'));
});
*/

Route::get('/tasks_api', 'TasksController@api');
Route::get('/tasks_api/{task}', 'TasksController@api_show');
Route::get('/about', 'TasksController@about');

/* Redoing all of the below with controllers for solidification
// If we return a database query, Laravel will return it as JSON
Route::get('/tasks_api', function () {
    $tasks = DB::table('tasks')->get();
    return $tasks;
});

// Here's an example of using a wildcard in the url
Route::get('/tasks_api/{id}', function ($id) {
    // dd($id); // This is a helper task laravel provides -- dump and die
    $task = DB::table('tasks')->find($id);
    dd($task);
});

Route::get('/about', function () {
    return view('about');
});
*/
