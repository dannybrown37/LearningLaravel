<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Here's the basic, hard-coded version
Route::get('/', function () {
    $name = 'Cool Site';
    $age = 1;
    $tasks = [
      'Go to the play',
      'Finish my Laravel tutorial',
      'Clean the house'
    ];
    return view('welcome', compact('name', 'age', 'tasks'));
});
*/

// After we've created tables in the database and added some data
Route::get('/', function () {
    $startDate = strtotime("2018/08/26");
    $now = time();
    $name = 'Dear Reader';
    $age = $now - $startDate;
    $age = round($age / (60 * 60 * 24));
    $tasks = DB::table('tasks')->get(); // This is laravel's query builder
    return view('welcome', compact('name', 'age', 'tasks'));
});

// Here are examples of routing to a view from the resources/views path
Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->latest()->get();
    return view('tasks.task_index', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {
    $task = DB::table('tasks')->find($id);
    return view('tasks.view_task', compact('task'));
});

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
