<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

// An event is anything of significance that happens in your application.
// As simple as a user registered, an order processed, a post was archived,
// or a forum thread was created. Significant actions that you need to alert
// your application to.

// You could do all of this inline, but that is ugly and takes a lot of work.
// Instead, we can use eventing.

// Anywhere else in an application can respond to an event.
// It's like yelling with a bullhorn -- everyone can hear it.

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // Our first custom-defined event listener and event.
        // Here, we are going to listen for a thread being created in hypothetical
        // forums. When that is done, it will notify the subscribers of the forum.
        'App\Events\ThreadCreated' => [
          'App\Listeners\NotifySubscribers',
          'App\Listeners\CheckForSpam',
        ]
    ];





    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
