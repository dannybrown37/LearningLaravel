@extends ('layouts.master')


@section('header')
  <div class="container">
    <h1 class="blog-title">The Tasks List</h1>
    <p class="lead blog-description">A nice intro to the Blade templating
    engine as well using data from a database.</p>
  </div>
@endsection


@section ('content')
    <!-- This is vanilla PHP -->
    <!--
    <h2>Vanilla PHP</h2>
    <ul>
      <?php foreach ($tasks as $task) : ?>
        <li><?= $task->body; ?></li>
      <?php endforeach; ?>
    </ul>
    -->

    <!-- This uses  blade, Laravel's templating engine. Compiles down to vanilla
         PHP. Thus, these each produce the same output. For basically any <?php  ?>
         directive, you can replace it simply with the @ symbol. -->
    <ul>
      @foreach ($tasks as $task)
        <li>
          <a href="/tasks/{{ $task->id }}">
            {{ $task->body }}
          </a>
        </li> <!-- note that semicolon not required for blade -->
      @endforeach
    </ul>
@endsection
