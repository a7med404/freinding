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
            $user_key = $this->user_key;
            $admin_panel = $this->admin_panel;
            $user = Auth::user();
            if ($user) {
                $user_key = $user->name;
                if ($user->can(['access-all', 'post-type-all', 'post-all'])) {
                    $admin_panel = 1;
                }
            }
            $title = 'Home' . " &#8211; " . $this->site_title;
            View::share('title', $title);

            return view('site.home', compact('user', 'admin_panel', 'user_key'));
        } else {
            return redirect()->route('close');
        }
    }

}
