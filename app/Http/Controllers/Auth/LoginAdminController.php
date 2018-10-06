<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
class LoginAdminController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     
//    protected $redirectTo = '/admin';
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $admin_panel = DB::table('options')->where('option_key', 'admin_url')->value('option_value');
        if($admin_panel == '' || $admin_panel == NULL){
        $admin_panel = 'admin';   
        }
        $this->redirectTo = '/'.$admin_panel;
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm() {
        

//         if (!session()->has('url.intended')) {
//            if(url()->previous() != 'http://127.0.0.1:8000/admin/login'){
            session()->put('url.intended', url()->previous());
//             }
//        }
        return view('admin.pages.login');
    }

    public function authenticated($request, $user) {
        return redirect(session()->pull('url.intended', $this->redirectTo));
        
    }

    

//    public function redirectPath() {
//        if (method_exists($this, 'redirectTo')) {
//            return $this->redirectTo();
//        }
//
//        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin';
//    }

    private function checkActive() {
        if (!Auth::user()->isActive()) {
            Auth::logout();
        }
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request) {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $this->checkActive();
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($this->redirectTo);
    }

}
