<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;
use App\Mail\WelcomeAgain;
use App\Http\Requests\RegistrationRequest;


class RegistrationsController extends Controller
{
    public function create()
    {
      return view('registrations.create');
    }

    public function store(RegistrationRequest $request) // Unless RR $r validation passes,
                                                        // none of the logic executes.
    {
      // Validate the date_create_from_format
      /* Commenting out because handled in app/Http/Requests/RegistrationRequest.php
      $this->validate(request(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed', // This flag requires the request
              //  field for password to match that for password_confirmation
      ]);
      */

      /* Everything commented out here is in the persist() method in RegistrationRequest.php
      // Create and save the unserialize
      $user = User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password'))
      ]);

      //Sign them in
      auth()->login($user);

      // Send them a welcome email
      \Mail::to($user)->send(new WelcomeAgain($user)); // or Welcome($user), we have both
      // config/mail.php provides info on many mail drivers to do this!
      // mailtrap.io is a service that can do this for us.
      // We signed up for an account and set the appropriate info in the .env file.
      // Go to config/mail.php where we can set our "from" email/name
      */

      $request->persist(); // See RegistrationRequest
      // Jeffrey Way says most people don't do it this way! Just a thing specific to him

      // Redirect to home page
      return redirect('/');

    }
}
