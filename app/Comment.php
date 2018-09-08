<?php

namespace App;

class Comment extends Model
{
    public function post()
    {
      return $this->belongsTo(Post::class);
    }
    // using $comment->post in tinker will return the post associated with a comment

    public function user() // $comment->user->name -- This would get the name
    {
      return $this->belongsTo(User::class);
    }
}
