<?php

namespace App\Listeners;

use App\Events\ReFollowEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyReFollowListener
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
        //
    }
}
