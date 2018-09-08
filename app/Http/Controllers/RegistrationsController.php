<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationsController extends Controller
{
    public function create()
    {
      return view('registrations.create');
    }

    public function store()
    {
      // Validate the date_create_from_format
      $this->validate(request(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed', /* This flag requires the request
              *  field for password to match that for password_confirmation */
      ]);

      // Create and save the unserialize
      $user = User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password'))
      ]);

      //Sign them in
      auth()->login($user);

      // Redirect to home page
      return redirect()->home();

    }
}
