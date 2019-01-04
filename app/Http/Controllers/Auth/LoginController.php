<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Site\SiteController;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\UserSite\Http\Controllers\UserSiteController;


class LoginController extends SiteController
{
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
    protected $redirectTo = '/';

    private function checkActive()
    {
        if (!Auth::user()->isActive()) {
            Auth::logout();
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
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

    public function authenticated($request, $user)
    {
        $users = User::where('id', Auth::user()->id)->first();
        if ($users->birthdate == Null) {
            return redirect('registration_two');
        } else if ($users->nationality == Null) {
            return redirect('registration_three');
        }
        $UserSiteController = new UserSiteController;
        action('UserSiteController@save_activity');
//        $UserSiteController->save_activity();
    }

    public function logout(Request $request)
    {
        $user = Auth::User();
        // $user_sesstion = SessionTime::getSessionTime($user->id, 'hour_out', NULL);
        // $date = strtotime(time());
        // $input['hour_out'] = date('H:i:s'); //date('H:i:s', time());
        // $user_sesstion->update($input);
        Auth::logout();
        return redirect()->intended($this->redirectPath());
    }

}
