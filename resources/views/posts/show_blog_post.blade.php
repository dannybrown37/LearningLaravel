@extends ('layouts.master')


@section('header')
  <div class="container">
    <h1 class="blog-title">{{ $post->title }}</h1>
  </div>
@endsection


@section ('content')

  <p>
    {{ $post->body }}
  </p>
  <p class="blog-post-meta">
    Posted by {{ $post->user->name }} at {{$post->created_at->toFormattedDateString()}} |
    <a href="/blog">Return to Blog Index</a>
  </p>

  <div class="comments">
    <ul class="list-group">
    @foreach ($post->comments as $comment)
      <li class="list-group-item">
        <em>
          {{ $comment->created_at->diffForHumans() }} by {{ $comment->user->name }}:
          <!-- returns a readable form of how long ago apost was -->
        </em>
        {{ $comment->body }}
      </li>
    @endforeach
    </ul>
  </div>

  <!-- add a comment -->

  <div class="card">
    @include ('layouts.errors')
    <div class="card-block">
      <form method="POST" ACTION="/blog/{{ $post->id }}/comments/">
        {{ csrf_field() }}
        <div class="form-group">
          <textarea name="body" class="form-control" placeholder="Comment!"></textarea>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Publish</button>
        </div>
      </form>
    </div>
  </div>



@endsection
