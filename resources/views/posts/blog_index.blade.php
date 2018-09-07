@extends ('layouts.master')


@section ('header')
  <div class="container">
    <h1 class="blog-title">The Danny-Learns-Laravel Blog</h1>
    <p class="lead blog-description">An example blog template crash coursing both
      Laravel and Bootstrap.</p>
  </div>
@endsection


@section ('content')

  @foreach ($posts as $post)
    <div class="blog-post">
      <h2 class="blog-post-title">
        <a href="/blog/{{ $post->id }}">
          {{ $post->title }}
        </a>
      </h2> <!-- note that semicolon not required for blade -->
      <p>
        {{ $post->body }}
      </p>
      <p class = "blog-post-meta">
        <!-- Created at {{$post->created_at}} --> <!-- This basic format is not attractive -->
        {{ $post->created_at->toFormattedDateString() }}
      </p>
      <hr>
    </div>
  @endforeach

@endsection
