<?php

namespace App\Listeners;

use App\Events\AddFriendEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAddFriendListener
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
        //
    }
}
