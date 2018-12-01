<?php

namespace Modules\UserSite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Site\SiteController; //as SiteController
use Auth;
use Hash;
use App\User;

//use App\Model\Options;
class UserSiteController extends SiteController {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index() {
        if ($this->site_open == 1 || $this->site_open == "1") {
            $lang = 'en';
            $prof = 1;
            $user = Auth::user();
            $user_key = $user->name;
            $admin_panel = 0;
            if ($user->can(['access-all', 'post-type-all', 'post-all'])) {
                $admin_panel = 1;
            }
            $title = 'Home' . " &#8211; " . $this->site_title;
            View::share('title', $title);
            $form_type = 'personal';
            return view('usersite::index', compact('prof', 'form_type', 'user', 'admin_panel', 'user_key'));
        } else {
            return redirect()->route('close');
        }
    }

    public function profileSetting() {
        if ($this->site_open == 1 || $this->site_open == "1") {
            $wrong_form = $correct_form = null;
            $lang = 'en';
            $prof = 1;
            $user = Auth::user();
            $user_key = $user->name;
            $admin_panel = 0;
            if ($user->can(['access-all', 'post-type-all', 'post-all'])) {
                $admin_panel = 1;
            }
            $title = 'Home' . " &#8211; " . $this->site_title;
            View::share('title', $title);
            $form_type = 'personal';
            $dataForm = SesstionFlash();
            $correct_form = $dataForm['correct_form'];
            $wrong_form = $dataForm['wrong_form'];
            return view('usersite::setting', compact('prof', 'form_type', 'user', 'admin_panel', 'user_key', 'correct_form', 'wrong_form'));
        } else {
            return redirect()->route('close');
        }
    }

    public function changepasswordSetting() {
        if ($this->site_open == 1 || $this->site_open == "1") {
            $wrong_form = $correct_form = null;
            $lang = 'en';
            $prof = 1;
            $user = Auth::user();
            $user_key = $user->name;
            $admin_panel = 0;
            if ($user->can(['access-all', 'post-type-all', 'post-all'])) {
                $admin_panel = 1;
            }
            $title = 'Home' . " &#8211; " . $this->site_title;
            View::share('title', $title);
            $form_type = 'changepassword';
            $dataForm = SesstionFlash();
            $correct_form = $dataForm['correct_form'];
            $wrong_form = $dataForm['wrong_form'];
            return view('usersite::setting', compact('prof', 'form_type', 'user', 'admin_panel', 'user_key', 'correct_form', 'wrong_form'));
        } else {
            return redirect()->route('close');
        }
    }

    //profile 7 password store
    public function storeSetting(Request $request) {
        $user = Auth::user();
        if (isset($input['submit'])) {
            $this->validate($request, [
                'name' => 'required|max:255|unique:users,name,' . $user->id,
                'email' => 'required|max:255|email|unique:users,email,' . $user->id,
//                'phone' => 'max:50',
                'display_name' => 'required',
            ]);
        } elseif (isset($input['email_pass'])) {
            $this->validate($request, [
                'password' => 'same:confirm-password',
            ]);
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        if (isset($input['submit'])) {
//            $input['password'] = $user->password;
//            $input['name'] = $user->name;
//            $input['display_name'] = $input['name'];
            $newDate = explode('/', $input['datetimepicker']);
            if (count($newDate) == 3) {
                $input['birthdate'] = trim($newDate[2]) . '-' . trim($newDate[1]) . '-' . trim($newDate[0]);
            } else {
                $input['birthdate'] = $user->birthdate;
            }
            $user->update($input);
            session()->put('correct_form', 'Successfully Saved');
            return redirect()->route('profile.setting'); //->with('success', 'Successfully Saved');
        }
        if (isset($input['email_pass'])) {
            if ($input['password'] == $input['password_confirmation']) {
                $password_hash = Hash::make($input['user_pass']);  //bcrypt($input['user_pass']);
                if (Hash::check($input['user_pass'], $password_hash) && Hash::check($input['user_pass'], $user->password)) {
                    $new_password = Hash::make($input['password']);  //bcrypt($input['password']);
                    User::where('id', $user->id)->update(['password' => $new_password]);
                    session()->put('correct_form', 'Successfully Saved');
                } else {
                    session()->put('wrong_form', 'please enter current password correct');
                }
            } else {
                session()->put('wrong_form', 'enter password match');
            }
            return redirect()->route('profile.changepassword'); //->with('success', 'Successfully Saved');
        }
    }

    //*********************************************************

    public function countSetting() {
        if ($this->site_open == 1 || $this->site_open == "1") {
            $wrong_form = $correct_form = null;
            $lang = 'en';
            $prof = 1;
            $user = Auth::user();
            $user_key = $user->name;
            $admin_panel = 0;
            if ($user->can(['access-all', 'post-type-all', 'post-all'])) {
                $admin_panel = 1;
            }
            $title = 'Home' . " &#8211; " . $this->site_title;
            View::share('title', $title);
            $form_type = 'countsetting';
            $dataForm = SesstionFlash();
            $correct_form = $dataForm['correct_form'];
            $wrong_form = $dataForm['wrong_form'];
            return view('usersite::setting', compact('prof', 'form_type', 'user', 'admin_panel', 'user_key', 'correct_form', 'wrong_form'));
        } else {
            return redirect()->route('close');
        }
    }

    public function storeCount(Request $request) {
        $user = $this->user;
        if (isset($input['submit'])) {
            $this->validate($request, [
                'name' => 'required|max:255|unique:users,name,' . $user->id,
                'email' => 'required|max:255|email|unique:users,email,' . $user->id,
                'phone' => 'max:50',
//            'display_name' => 'required',
            ]);
        } elseif (isset($input['email_pass'])) {
            $this->validate($request, [
                'password' => 'same:confirm-password',
            ]);
        }
        $input = $request->all();
        foreach ($input as $key => $value) {
            $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
        }
        if (isset($input['submit'])) {
            $input['password'] = $user->password;
            $input['display_name'] = $input['name'];
            $input['name'] = $user->name;
            if ($user->display_name != $input['name'] && strpos($user->image, 'images/letterAEName') !== false) {
                $input['image'] = generateDefaultImage($input['display_name']);
            } else {
                $input['image'] = $user->image;
            }
            $update_user = $user->update($input);
            $data_meta = UserMeta::DataUserMetaValue($this->user->id, 'data', 'meta_value');
            $input['stateSend'] = $data_meta['stateSend'];
            $array_meta = array('birth_day' => $input['birth_day'], 'stateSend' => $input['stateSend'],
                'social' => ['facebook' => $input['facebook'], 'twitter' => $input['twitter'],
                    'instagram' => $input['instagram'], 'youtube' => $input['youtube']]);
            $meta_value = json_encode($array_meta);
            $meta = new UserMeta();
            $meta->updateMeta($user->id, $meta_value);
            session()->put('correct_form', trans('app.save_success'));
        }
        if (isset($input['email_pass'])) {
            if ($input['password'] == $input['password_confirmation']) {
                $password_hash = Hash::make($input['user_pass']);  //bcrypt($input['user_pass']);
                if (Hash::check($input['user_pass'], $password_hash) && Hash::check($input['user_pass'], $user->password)) {
                    $new_password = Hash::make($input['password']);  //bcrypt($input['password']);
                    User::where('id', $user->id)->update(['password' => $new_password]);
                    session()->put('correct', trans('app.Data_change_success'));
                } else {
                    session()->put('wrong', trans('app.please_verify_email_password'));
                }
            } else {
                session()->put('wrong', trans('app.enter_password_match'));
            }
            session()->put('correct', 'Successfully Saved');
        }
        return redirect()->route('usersite::setting'); //->with('success', 'Successfully Saved');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        return view('usersite::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {
        
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show() {
        return view('usersite::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit() {
        return view('usersite::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request) {
        
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy() {
        
    }

}
