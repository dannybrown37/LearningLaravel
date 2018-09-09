<?php

namespace App\Http\Controllers;

use App\Task;


class BaseController extends Controller
{

  public function index()
  {
      return view('welcome');
  }

  public function about()
  {
    $startDate = strtotime("2018/08/26");
    $now = time();
    $vacationDays = 7;
    $name = 'Dear Reader';
    $age = (round(($now - $startDate) / (60 * 60 * 24))) - $vacationDays;
    $tasks = Task::get(); // This is laravel's query builder
    return view('about', compact('name', 'age', 'tasks'));
  }

}
