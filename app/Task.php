<?php

// We can create a model and migration at the same time by adding an -m tag
// For example, to create this file, we used:
//    php artisan make:model Task -m

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{                          // Task::incomplete() returns an instance of Eloquent builder
    public function scopeIncomplete($query) // allows for Task::incomplete()->get();
    {                                       // Task::incomplete->where(*args)->get();
      return $query->where('completed', 0);
    }

    // This is a simpler version of the above that can't use additional queries 
    public static function complete()
    {
      return static::where('completed', 1)->get();
    }
}
