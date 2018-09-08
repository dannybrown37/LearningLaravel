@extends ('layouts.master')

@section ('header')
  <div class="container">
    <h1>Log On In, the Website's Fine</h1>
  </div>

@endsection

@section ('content')

  @include ('layouts.errors')

  <form action="/login" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class = "form-control" name="email" id="email" required>
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class = "form-control" name="password" id="password"
             required>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>

  </form>
@endsection
