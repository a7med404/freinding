<?php

namespace App\Listeners;

use App\Events\UnFollowEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UnFollowListener
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
     * @param  UnFollowEvent  $event
     * @return void
     */
    public function handle(UnFollowEvent $event)
    {
        //
    }
}
