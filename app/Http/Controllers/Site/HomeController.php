<?php

namespace App\Http\Controllers\Site;

//use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;
use Auth;

class HomeController extends SiteController {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home() {
        if ($this->site_open == 1 || $this->site_open == "1") {
            $lang = 'en';
            $user_key = NULL;
            $admin_panel =0;
            $user = Auth::user();
            if ($user) {
                return redirect('/posts');
            }
            $title = 'Home' . " &#8211; " . $this->site_title;
            View::share('title', $title);

            return view('site.home', compact('user', 'admin_panel', 'user_key'));
        } else {
            return redirect()->route('close');
        }
    }

}
