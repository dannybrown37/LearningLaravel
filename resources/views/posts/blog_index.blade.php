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
    <h2>
      <a href="/blog/{{ $post->id }}">
        {{ $post->title }}
      </a>
    </h2> <!-- note that semicolon not required for blade -->
    <p>
      {{ $post->body }}
    </p>
    <p>
      Created at {{$post->created_at}}
    </p>
    <hr>
  @endforeach

@endsection
