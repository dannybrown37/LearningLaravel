<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;

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

      // Send them a welcome email
      \Mail::to($user)->send(new Welcome($user));
      // config/mail.php provides info on many mail drivers to do this!
      // mailtrap.io is a service that can do this for us.
      // We signed up for an account and set the appropriate info in the .env file.
      // Go to config/mail.php where we can set our "from" email/name

      // Redirect to home page
      return redirect('/');

    }
}
