<?php

namespace App;

class Post extends Model
{
    // protected $fillable = ['title', 'body'];
    // protected $guarded = ['user_id']; // guarded is inverse of protected; fields not allowed
    // protected $guarded = []; // empty array means we aren't guarding anything
    // Alternatively, we can create a parent class. See app/Model.php

    public function comments()
    {
      return $this->hasMany(Comment::class); // full string representation of the full class
    }
    // using $post-comments in tinker will return a string of all comments

    public function user() // $comment->post->user
    {
      return $this->belongsTo(User::class);
    }


    public function addComment($body)
    {
      // We could use the long-form way from CommentsContrller; instead we use Eloquent:
      $this->comments()->create(compact('body'));
    }

}
