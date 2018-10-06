<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use DB;
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
    
    public function __construct()
    {
        $limit_view = DB::table('options')->where('option_key', 'pagi_limit')->value('option_value');
        $limit = is_numeric($limit_view) ? $limit_view : 12;
        $site_title = DB::table('options')->where('option_key', 'site_title')->value('option_value');
        $site_url = DB::table('options')->where('option_key', 'site_url')->value('option_value');
        $this->limit= $limit;
        $this->site_title= $site_title;
        $this->site_url= $site_url;
        $this->middleware('site.open',['except' => ['close']]);
        $this->middleware(function ($request, $next) {
        return $next($request);
    });
        
    }
    
    public function close(){
        return view('close');
    }
}
