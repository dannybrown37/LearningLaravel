<?php

use App\Task; // Allows us to refer to just Task rather than App\Task below

// INTRO TO SERVICE CONTAINERS
// Bind into the container
// ::singleton is an option
// ::instance is an option
/*
App::bind('App\Billing\Stripe', function () {
  // Return a new instance of the Stripe class passing through a secret key
  return new \App\Billing\Stripe(config('services.stripe.secret'));
});

// Resolve that Stripe instance out of the container
$stripe = App::make('App\Billing\Stripe');
// $stripe = resolve('App\Billing\Stripe'); // does the same thing

// Dump it to the page
dd($stripe); // this doesn't work for me for some reason, I don't care very much?
*/
// We ultimately definitely don't want this in our routes file, so we're moving it
// to app/Providers/AppServiceProivder.php

Route::get('/', function () {
  return view('welcome');
})->name('home'); // This is named home and will redirect here when redirecting to home

// After we've created tables in the database and added some data
Route::get('/about', function () {
    $startDate = strtotime("2018/08/26");
    $now = time();
    $vacationDays = 7;
    $name = 'Dear Reader';
    $age = (round(($now - $startDate) / (60 * 60 * 24))) - $vacationDays;
    $tasks = DB::table('tasks')->get(); // This is laravel's query builder
    return view('about', compact('name', 'age', 'tasks'));
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

Route::get('/tasks/create', 'TasksController@create');
Route::post('/tasks', 'TasksController@store');
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

// Starting the actual blog

Route::get('/blog', 'PostsController@index');
// Things we will need:
//  controller -> PostsController (tutorial preference is plural)
//  eloquent model -> Post (standard is singular)
//  migration -> create_posts_table
// We could run all three of these commands:
// 1 php artisan make:controller PostsController
// 2 php artisan make:model Post
// 3 php artisan make:migration create_posts_table -create=posts
// Or we could combine them in the make:model with a couple flags:
// <<< php artisan make:model Post -mc

Route::get('/blog/create', 'PostsController@create');
Route::post('/blog', 'PostsController@store');
Route::get('/blog/{post}', 'PostsController@show');
Route::post('/blog/{post}/comments', 'CommentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/register', 'RegistrationsController@create');
Route::post('/register', 'RegistrationsController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy'); // Could use a post request too
