<?php

namespace App\Listeners;

use App\Events\ThreadCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscribers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ThreadCreated  $event
     * @return void
     */
    public function handle(ThreadCreated $event)
    {
        // For example, we might ultimately want to do something like this:
        // $event->thread->subscribers->forEach(function ($subscriber))
        // Ultimately, we'll want to do something like this.
        var_dump($event->thread['name'] . ' was published to the forum.');
    }
}
