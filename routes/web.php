<?php

// BaseController
Route::get('/', 'BaseController@index')->name('welcome');
Route::get('/about', 'BaseController@about');

// TasksController
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create');
Route::post('/tasks', 'TasksController@store');
Route::get('/tasks/{task}', 'TasksController@show');
Route::get('/tasks_api', 'TasksController@api');
Route::get('/tasks_api/{task}', 'TasksController@api_show');

// PostsController
Route::get('/blog', 'PostsController@index');
Route::get('/blog/create', 'PostsController@create');
Route::post('/blog', 'PostsController@store');
Route::get('/blog/{post}', 'PostsController@show');
Route::post('/blog/{post}/comments', 'CommentsController@store');

// Auth stuff
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'RegistrationsController@create');
Route::post('/register', 'RegistrationsController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy'); // Could use a post request too
