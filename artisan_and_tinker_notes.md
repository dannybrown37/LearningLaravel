1.  Interact with Laravel's shell with this command
      php artisan tinker
    (How beautiful is this for an MTG site?)
2.  Here are some basic shell commands and their effect
    <<< App\Task::all()
    Returns list of all items from Task model.
    <<< App\Task::where('id', '>', 1)->get()
    Returns the list of all items with id greater than 1
    <<< App\Task::pluck('body')
    Returns just the body of every record in the model.
3.  We can also use the above syntax in our routes, now that we have the models
    file in our app folder. And will be adding that now.
4. Creating new tasks directly within tinker:
    $task = new App\Task; // Creates new task
    $task->body = "Go to the play";
    $task->completed = false; // Dumb, we'll set a default instead.
5. How to fetch tasks that are completed or not:
     App\Task::where('completed', 0)->get();
     // Let's make this cleaner. First we'll add a queryscope to our model.
     // (see the model, obv) Also copying here from model:
     public static function incomplete()
     {
       return static::where('completed', 0)->get();
     }
     // Now we can run:
     App\Task::incomplete();
     // And it will provide the same results as the first command in bullet 5.
     App\Task::complete(); // The opposite works too and I added it as well.
6. php artisan make:controller NameOfController
   --> makes a controller at app\Http\Controllers
7. php artisan make:model Post -mc
   --> makes a model named Post with a migration and a controller
8. Trick when generating a controller:
  <<< php artisan make:controller TasksController -r
  The -r flag makes a "resourceful" controller, which will include shells for
  the following functions:
    -- index GET to /tasks
    -- create GET to /tasks/create
    -- store POST to /tasks
    -- show GET to /tasks/{id}
    -- edit GET to /tasks/{id}/edit
    -- update PATCH to /tasks/{id}
    -- destroy DELETE /tasks/{id}
9. php artisan make:auth
   --> scaffolds basic login and registration views.
   --> does all the annoying, tedious stuff for you in just minutes.
   --> intended to do more or less at the beginning of the project.
10. Creating a new user using tinker:
    λ php artisan tinker
    Psy Shell v0.9.7 (PHP 7.2.8 — cli) by Justin Hileman
    $user = new App\User;
    => App\User {#2928}
    $user->name = 'danny';
    => "danny"
    $user->email = 'danny@test.com';
    => "danny@test.com"
    $user->password = bcrypt('dont-hard-code-the-password');
    => "$2y$10$66T8v3DvgXbvl.vdQJCVXeOa/hs63LYeeoips2/n1GCzTcQwAdnla"
11. Using model factories for unit testing within tinker:
    factory('App\User')->make();
    <<< Outputs a fake name and a fake email
    factory('App\User')->create();
    <<< Same, except it persists the data and includes a created_at, etc.
    factory('App\User', 50)->make();
    <<< Makes 50 users
12. php artisan make:provider SocialMediaServiceProvider
    -- This makes a new service provider class named SocialMediaServiceProvider
    ----> It is created in App\Providers\SocialMediaServiceProdier.php
    ------> Then to use it, we update are config/app.php file to include in the list.
13. 
