<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;

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
        $title = "Home" . " &#8211; " . $this->site_title;
        View::share('title', $title);
        return view('home');
    }
}