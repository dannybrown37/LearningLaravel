<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.blog_index');
    }

    public function show()
    {
      return view('posts.show_blog_post');
    }
}
