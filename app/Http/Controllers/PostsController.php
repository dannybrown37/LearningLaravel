<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.blog_index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show_blog_post', compact('post'));
    }

    public function create()
    {
        return view('posts.create_post');
    }

    public function store()
    {
        // On the most basic level, we can just display submitted data as JSON:
        //dd(request()->all());
        //dd(request('title'));
        //dd(request('body'));
        //dd(request(['title', 'body']));
        // Commented out because not actually useful

        /* Alternatively defined below
        // Create a new post using the request data
        $post = new Post;

        $post->title = request('title');
        $post->body = request('body');

        // Save it to the database
        $post->save();

        // Redirect to the home page
        return redirect('/blog');
        */

        // Here's an alternative method to do the same thing as above:
        /* Alternatively defined below again
        Post::create([
          'title' => request('title'),
          'body' => request('body')
        ]);
        */
        // But *only* with a protected $fillable designation in app/Post.php

        // Or this syntax works too!:
        Post::create(request(['title', 'body']));
    }
}
