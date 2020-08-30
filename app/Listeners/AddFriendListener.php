<?php

namespace App\Listeners;

use App\User;
use App\Events\AddFriendEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Friend\AddFriendNotification;

class AddFriendListener
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
     * @param  AddFriendEvent  $event
     * @return void
     */
    public function handle(AddFriendEvent $event)
    {
        $user = $event->user;
        $user->notify(new AddFriendNotification(\Auth::user()));
    }
}
