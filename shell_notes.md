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
7. 
