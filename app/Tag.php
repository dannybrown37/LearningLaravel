<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Setting up a many-to-many relationship here with the belongsToMany below
    // The other half is in Post.php
    public function posts()
    {
      return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
      return 'name';
    }

}
