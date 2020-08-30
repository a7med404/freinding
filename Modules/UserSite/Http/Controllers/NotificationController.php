<?php

namespace Modules\UserSite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\UserSite\Entities\Notification;

class NotificationController extends Controller
{

    public function get(){
      return \Auth::user()->unreadNotifications()->get();
    }


    public function read(Request $request){
      // dd($request->all());
       $ntifiy= \Auth::user()->unreadNotifications()->where('id', $request->id)->update(['read_at' => now()]);
       // $user->unreadNotifications->markAsRead();
       return "redaed";
       dd($ntifiy);
       // return view('usersite::index');
    }




    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function allNotification()
    {
      $notifications = \Auth::user()->notifications()->get();
        return view('usersite::notifications.all-notifications', ['notifications' => $notifications]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('usersite::');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('usersite::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('usersite::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('usersite::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
