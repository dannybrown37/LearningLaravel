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
    Created at {{$post->created_at}}
  </p>

@endsection
