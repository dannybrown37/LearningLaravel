<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
      /* // This is the basic, long-form version, we are improving on it below
      Comment::create([
        'body' => request('body'),
        'post_id' => $post->id
      ]);
      */

      $this->validate(request(), ['body' => 'required|min:2']);

      $post->addComment(request('body')); // see Post model for addComment()

      return back(); // helper function that redirects to previous page
    }
}
