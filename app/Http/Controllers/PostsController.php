<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show']); // Must be signed in to create a post
    }

    public function index()
    {
        /* This is all a little gross, let's refactor below
        $posts = Post::latest(); // inverse of latest() is oldest()

        if ($month = request('month')) {
          $posts->whereMonth('created_at', $month);
        }

        if ($year = request('year')) {
          $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();
        */

        // Refactoring of above by placing it in Post.php in scopeFilter():
        $posts = Post::latest()->filter(request(['month', 'year']))->get();
        // see scopeFilter() in Post.php

        // Retrieval functions now stored in Post.php in archives()
        $archives = Post::archives();

        return view('posts.blog_index', compact('posts', 'archives'));
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

        $this->validate(request(), [
          'title' => 'required|min:2', // lots of tags available, check the docs
          'body' => 'required|min:2',
        ]); // validate() tries to validate. If it doesn't, redirects back.
        // When redirects, it returns a populated error variable.
        // We can use this in create_post.blade.php --> see this file

        /* Alternatively defined below
        Post::create([
          'title' => request('title'),
          'body' => request('body'),
          'user_id' => auth()->id()
        ]);
        */

        // Here's an alternate method to do the same thing as above:
        auth()->user()->publish(
          new Post(request(['title', 'body'])) // See User.php for publish method
        );


        // Redirect to the home page
        return redirect('/blog');



    }
}
