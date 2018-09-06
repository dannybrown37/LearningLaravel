@extends ('layouts.master')

@section ('content')
    <h1>The Tasks List</h1>

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
    <h2>Defined With the Blade Templating Engine</h2>
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
