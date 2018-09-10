@extends ('layouts.master')

  @section ('header')
    <div class="container">
      <h1>Welcome!</h1>
    </div>
  @endsection

  @section ('content')
    <p>Welcome to the site!</p>

    @if ($flash = session('message'))
      <div id="flash-message" class="alert alert-success" role="alert">
        {{ $flash }}
      </div>
    @endif

  @endsection
