<<?php

/*
  You may get to a point where you'd like to take some queries and extract them
  to a dedicated class. This class, for example, might be a collection of posts.
  They can be filtered, return results, even add new items to the collection.

  We have created such a class in this file, down below:
*/

namespace App\Repositories;

use App\Post;

class Posts
{
  protected $redis;

  public function __contruct(Redis $redis)
  {
    $this->redis = $redis;
  } // See app/Reddis.
    // What happens here is that when PostsController tries to request an instance
    // of $posts, Posts has dependencies of its own: Redis, in this instance.
    // This will therefore launch of an instance of Redis within an instance of
    // Posts when called.
    // (This is all a bit over my head tbh, I understand what happens but not
    // why it's important.)

  public function all()
  {
    return Post::all();
  }

  public function find()
  {
    // Danger of using repositiores like this is that you recreate Eloquent.
    // The plus is that you can extract repetitive code out of the controller.
    // Be sure and only use these when needed!
    // Ultimately we're not really planning to use repos for this learning project.
  }

}
