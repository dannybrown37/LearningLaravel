<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar', function ($view) {
          $archives = \App\Post::archives();
          $tags = \App\Tag::has('posts')->pluck('name');
          // has('posts') gets tags only if they are associated with a post.
          // pluck() gets just the name column, all we care about getting.

          $view->with(compact('archives', 'tags'));

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // \App::singleton(et al) works too...
        $this->app->singleton(Stripe::class, function () {
          return new Stripe(config('services.stripe.secret'));
        });
        // dd(resolve('\App\Billing\Stripe')); // for example purposes in routes file

    }
}
