<?php

namespace App\Listeners;

use App\User;
use App\Events\FollowEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Follow\FollowNotification;

class FollowListener
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
     * @param  FollowEvent  $event
     * @return void
     */
    public function handle(FollowEvent $event)
    {
      $user = $event->user;
      $user->notify(new FollowNotification(\Auth::user()));
    }
}
