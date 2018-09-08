<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest', ['except' => 'destroy']); // Only guests can make it through this filter
    // Authorized users don't get to access these functions
  }

  public function create()
  {
    return view('sessions.create');
  }

  public function store()
  {
    // Attempt to authenticate the user
    if (! auth()->attempt(request(['email', 'password']))) {
      return back()->withErrors([
        'message' => 'Please check your credentials and try again.'
      ]); // If not, redirect them back
    }
    // If so, sign them in

    // Redirect to home page
    return redirect()->home();

  }

  public function destroy()
  {
    auth()->logout();

    return redirect()->home();
  }
}
