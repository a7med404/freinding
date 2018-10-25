<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Model\Options;
use Auth;
//use DB;

class SiteController extends Controller {
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
    protected $limit;
    protected $site_title;
    protected $site_url;
    protected $site_open;
    protected $lang;

    public function __construct() {
        $array_option_key = ['pagi_limit', 'site_title', 'site_url', 'site_open'];
        $All_options = Options::get_Option('setting', $array_option_key);
        foreach ($All_options as $key => $value_option) {
            if ($value_option->option_key == 'pagi_limit' && !empty($value_option->option_value)) {
                $limit_view = $value_option->option_value;
            } elseif ($value_option->option_key == 'site_url' && !empty($value_option->option_value)) {
                $site_url = $value_option->option_value;
            } elseif ($value_option->option_key == 'site_title' && !empty($value_option->option_value)) {
                $site_title = $value_option->option_value;
            } elseif ($value_option->option_key == 'site_open') {
                $site_open = $value_option->option_value;
            }
        }
        $limit = is_numeric($limit_view) ? $limit_view : 15;
        $this->limit = $limit;
        $this->site_title = $site_title;
        $this->site_url = $site_url;
        $this->site_open = $site_open;
        $this->lang = 'en';
        
        $this->middleware('site.open', ['except' => ['close']]);
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }

    public function close() {
        $message_close = 'wellcome in friending';
        $msgmain_close = 'close site';
        $logo_image = asset('olympus/img/logo.png');
        $array_option_key = ['msgmain_close', 'message_close', 'logo_image'];
        $All_options = Options::get_Option('setting', $array_option_key);
        foreach ($All_options as $key => $value_option) {
            if ($value_option->option_key == 'msgmain_close' && !empty($value_option->option_value)) {
                $msgmain_close = $value_option->option_value;
            } elseif ($value_option->option_key == 'message_close' && !empty($value_option->option_value)) {
                $message_close = $value_option->option_value;
            } elseif ($value_option->option_key == 'logo_image' && !empty($value_option->option_value)) {
                $logo_image = $value_option->option_value;
            }
        }

        return view('close', compact('message_close', 'msgmain_close', 'logo_image'));
    }

}
