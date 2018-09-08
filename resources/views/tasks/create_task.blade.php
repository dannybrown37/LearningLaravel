@extends ('layouts.master')

@section ('header')
<div class="container">
  <h1 class="blog-title">Add a Task</h1>
  <p class="lead blog-description">We are going to get so much done.</p>
</div>
@endsection

@section ('content')
  <form method="POST" action="/tasks">
    {{ csrf_field() }} <!-- include this call with every form -->
    <div class="form-group">
      <label for="body">Task Needing Doing:</label>
      <input type="text" class="form-control" id="body"
             name="body" required></input>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </form>

  @include ('layouts.errors')

@endsection
