<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // 'App\Events\FriendShipEvent' => [
        //     'App\Listeners\AddListener',
        //     'App\Listeners\AcceptListener',
        // ],
        'App\Events\AddFriendEvent' => [
            'App\Listeners\AddFriendListener',
            'App\Listeners\NotifyAddFriendListener'
        ],
        'App\Events\DeleteFriendEvent' => [
            'App\Listeners\DeleteFriendListener',
            'App\Listeners\NotifyDeleteFriendListener'
        ],
        'App\Events\AcceptFriendEvent' => [
            'App\Listeners\AcceptFriendListener',
            'App\Listeners\NotifyAcceptFriendListener'
        ],


        'App\Events\FollowEvent' => [
            'App\Listeners\FollowListener',
            'App\Listeners\NotifyFollowListener'
        ],
        'App\Events\ReFollowEvent' => [
            'App\Listeners\ReFollowListener',
            'App\Listeners\NotifyReFollowListener'
        ],
        'App\Events\UnFollowEvent' => [
            'App\Listeners\UnFollowListener',
            'App\Listeners\NotifyUnFollowListener'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
