<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use App\Mail\WelcomeAgain;
use Illuminate\Foundation\Http\FormRequest;

// RegistrationRequest is a child of the FormRequest class
class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required|confirmed',
        ];
    }

    public function persist()
    {
      // Create and save the unserialize
      $user = User::create(
        /*[ // instead of this, we'll do below:
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password'))
        ]*/
        $this->only(['name', 'email', 'password'])
      );

      //Sign them in
      auth()->login($user);

      // Send them a welcome email
      \Mail::to($user)->send(new WelcomeAgain($user)); // or Welcome($user), we have both
      // config/mail.php provides info on many mail drivers to do this!
      // mailtrap.io is a service that can do this for us.
      // We signed up for an account and set the appropriate info in the .env file.
      // Go to config/mail.php where we can set our "from" email/name
    }
}
