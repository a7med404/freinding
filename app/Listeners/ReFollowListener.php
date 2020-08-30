<?php

namespace App\Listeners;

use App\User;
use App\Events\ReFollowEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Follow\ReFollowNotification;

class ReFollowListener
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
     * @param  ReFollowEvent  $event
     * @return void
     */
    public function handle(ReFollowEvent $event)
    {
      $user = $event->user;
      $user->notify(new ReFollowNotification(\Auth::user()));
    }
}
