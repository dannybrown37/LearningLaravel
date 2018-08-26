<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Hello, <?php echo $name ?>! You are <?php echo $age ?> day(s) old. </h1>

    <!-- This is vanilla PHP -->
    <h2>Vanilla PHP</h2>
    <ul>
      <?php foreach ($tasks as $task) : ?>
        <li><?= $task->body; ?></li>
      <?php endforeach; ?>
    </ul>

    <!-- This uses  blade, Laravel's templating engine. Compiles down to vanilla
         PHP. Thus, these each produce the same output. For basically any <?php  ?>
         directive, you can replace it simply with the @ symbol. -->
    <h2>Blade Templating Engine</h2>
    <ul>
      @foreach ($tasks as $task)
        <li>{{ $task->body }}</li> <!-- note that semicolon not required for blade -->
      @endforeach
    </ul>
  </body>
</html>
