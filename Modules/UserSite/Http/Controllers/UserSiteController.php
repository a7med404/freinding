<?php

namespace Modules\UserSite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Site\SiteController ; //as SiteController
use Auth;
class UserSiteController extends SiteController {
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(){
        if ($this->site_open == 1 || $this->site_open == "1") {
            $lang = 'en';
            $user = Auth::user();
            $user_key = $user->name;
            $admin_panel = $this->admin_panel;
           if ($user->can(['access-all', 'post-type-all', 'post-all'])) {
                $admin_panel = 1;
            }
            $title = 'Home' . " &#8211; " . $this->site_title;
            View::share('title', $title);
            $form_type='personal';
            return view('usersite::index', compact('form_type','user','admin_panel', 'user_key'));
        } else {
            return redirect()->route('close');
        }
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
