<?php

namespace App\Listeners;

use App\User;
use App\Events\AcceptFriendEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Friend\AcceptFriendNotification;

class AcceptFriendListener
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
     * @param  AcceptFriendEvent  $event
     * @return void
     */
    public function handle(AcceptFriendEvent $event)
    {
      $user = $event->user;
      $user->notify(new AcceptFriendNotification(\Auth::user()));
    }
}
