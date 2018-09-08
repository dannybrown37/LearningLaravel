@extends ('layouts.master')

@section ('header')
<div class="container">
  <h1 class="blog-title">Create a Blog Post</h1>
  <p class="lead blog-description">This is going to be a really good post.</p>
</div>
@endsection

@section ('content')
  <form method="POST" action="/blog">
    {{ csrf_field() }} <!-- include this call with every form -->
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title"
             name="title" required>
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea name="body" id="body" rows="8" cols="80"
                class="form-control" required></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Publish</button>
    </div>
  </form>

  @include ('layouts.errors')

@endsection

<!-- NOTES
  GET /posts    --view all posts
  GET /posts/create   --create a new post
  POST /posts     -- add a new post to /posts with a POST request
  GET /posts/{id}/edit    -- edit an existing post
  GET /posts/{id}   -- displays an individual post
  PATCH /posts/{id}   -- when you submit the edit form, it will submit a patch request to this

  The point is we can use the same URI for different things, based on what <thead>
  type of request is!

-->
