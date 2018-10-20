<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use DB;

class RegisterController extends SiteController {
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
    public function __construct() {
        parent::__construct();
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
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
    protected function MakeConfirmValidat(array $input) {
        $wrong_form = $correct_form = NULL;
        if (isset($input['optionsCheckboxes']) && $input['optionsCheckboxes'] == "on") { //optionsCheckboxes=terms
            if (strlen($input['password']) >= 8 && strlen($input['password']) <= 100) {
                if ($input['password'] == $input['password_confirmation']) {
                    if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL) === false) {
                        //confirm not use email
                        $user_email_id = User::foundUser($input['email'], 'email');
                        if ($user_email_id <= 0) {
                            $user_name_id = User::foundUser($input['name'], 'name');
                            if ($user_name_id <= 0) {
                                if (strlen($input['name']) >= 3 && strlen($input['name']) <= 100) {
                                    if (strlen($input['display_name']) >= 3 && strlen($input['display_name']) <= 100) {
//                                if (preg_match("/^[0-9]{8,16}$/", $input['phone'])) {
                                        //confirm not use phone
//                                    $user_phone_id = User::foundUser($input['phone'], 'phone');
//                                    if ($user_phone_id <= 0) {
                                        //ok register
                                        $wrong_form = NULL;
//                                    } else {
//                                        $wrong_form = 'Phone number already used';
//                                    }
//                                } else {
//                                    $wrong_form = 'Please enter your phone number correctly';
//                                }
                                    } else {
                                        $wrong_form = 'Display name must be at least 3 characters and not more than 100 characters';
                                    }
                                } else {
                                    $wrong_form = 'User name must be at least 3 characters and not more than 100 characters';
                                }
                            } else {
                                $wrong_form = 'Email already used';
                            }
                        } else {
                            $wrong_form = 'Email already used';
                        }
                    } else {
                        $wrong_form = 'Email is incorrect';
                    }
                } else {
                    $wrong_form = 'Please enter the match password';
                }
            } else {
                $wrong_form = 'Password not less than 8 characters and not more than 100 characters';
            }
        } else {
            $wrong_form = 'Please agree to the terms and conditions';
        }
        return $wrong_form;
    }

    protected function addCreate($request, array $input, $user_role = '') {
        if (empty($user_role)) {
            $user_role = DB::table('options')->where('option_key', 'default_role')->value('option_value');
        }
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($input)));
        $user->attachRole($user_role);
        $this->guard()->login($user);
        return $user;
    }

    protected function create(array $data) {
        $user_active = DB::table('options')->where('option_key', 'user_active')->value('option_value');
        $is_active = is_numeric($user_active) ? $user_active : 0;
        return User::create([
                    'name' => stripslashes(trim(filter_var($data['name'], FILTER_SANITIZE_STRING))),
                    'display_name' => stripslashes(trim(filter_var($data['display_name'], FILTER_SANITIZE_STRING))),
                    'email' => stripslashes(trim(filter_var($data['email'], FILTER_VALIDATE_EMAIL))),
                    'gender' => stripslashes(trim(filter_var($data['gender'], FILTER_VALIDATE_EMAIL))),
                    'birthdate' => stripslashes(trim(filter_var($data['datetimepicker'], FILTER_VALIDATE_EMAIL))),
                    'password' => bcrypt($data['password']),
                    'is_active' => $is_active,
        ]);
    }

    public function register(Request $request) {
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        $wrong_form = $correct_form = NULL;
        $wrong_form = $this->MakeConfirmValidat($input);
        if (empty($wrong_form)) {
            $user = $this->addCreate($request, $input);
            //send email
            $sen_email = User::SendEmailTOUser($user['id'], 'register');
            return $this->registered($request, $user) ?: redirect($this->redirectPath());
        } else {
            return view('auth.register', compact('wrong_form', 'correct_form'));
        }
    }

}
