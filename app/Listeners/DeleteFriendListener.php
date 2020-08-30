<?php

namespace App\Listeners;

use App\Events\DeleteFriendEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteFriendListener
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
     * @param  DeleteFriendEvent  $event
     * @return void
     */
    public function handle(DeleteFriendEvent $event)
    {
        //
    }
}
