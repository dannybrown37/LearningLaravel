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
  <p>
    Posted at {{$post->created_at->toFormattedDateString()}} |
    <a href="/blog">Return to Blog Index</a>
  </p>

@endsection
