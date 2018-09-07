@extends ('layouts.master')



@section ('header')
  <div class="blog-header">
    <div class="container">
      <h1 class="blog-title">About the Site</h1>
      <p class="lead blog-description">Just one extremely bearded dude learning Laravel.</p>
    </div>
  </div>
@endsection

@section ('content')
    <p>Hello, {{ $name }}! This site is {{ $age }} days old.</p>
@endsection
