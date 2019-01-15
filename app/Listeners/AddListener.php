<?php

namespace App\Listeners;

use App\Events\FriendShipEvent;
use App\Notifications\NewFriendNotification;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddListener
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
     * @param  FriendShipEvent  $event
     * @return void
     */
    public function handle(FriendShipEvent $event)
    {
        $user = $event->user;
        $user->notify(new NewFriendNotification(\Auth::user()));
    }
}
