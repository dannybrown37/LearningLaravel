<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded = []; // empty array means we aren't guarding anything
    // Alternatively, we have created a parent class. See app/Post.php

    // The benefits of creating this parent class is that for every Eloquent
    // model created in the future, I will not have to repeat this.
}
