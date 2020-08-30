<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MarkNotificationAsRead
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      // dd($request->all());
      // if($request->has('read')) {
      //     $user = auth()->user();
      //     $notification = $user->unreadNotifications()->first();
      //     if($notification) {
      //         $notification->markAsRead();
      //     }
      // }
      return $next($request);
    }
}
