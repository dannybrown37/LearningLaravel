@extends ('layouts.master')


@section ('header')
  <div class="container">
    <h1 class="blog-title">The Task</h1>
    <p class="lead blog-description">Do what you gotta do.</p>
  </div>
@endsection


@section ('content')
    <p>This is the task:</p>
    <p>{{ $task->body }}</p>
@endsection
