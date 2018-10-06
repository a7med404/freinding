<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use DB;

class RegisterController extends SiteController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user_active = DB::table('options')->where('option_key', 'user_active')->value('option_value');
        $is_active = is_numeric($user_active) ? $user_active : 0;
        return User::create([
            'name' => stripslashes(trim(filter_var($data['name'], FILTER_SANITIZE_STRING))),
            'email' => stripslashes(trim(filter_var($data['email'], FILTER_VALIDATE_EMAIL))),
            'password' => bcrypt($data['password']),
            'is_active' => $is_active,
        ]);
    }
    
    public function register(Request $request)
    {
        $user_role = DB::table('options')->where('option_key', 'default_role')->value('option_value');
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $user->attachRole($user_role);
        $this->guard()->login($user);
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
        
    }
}
