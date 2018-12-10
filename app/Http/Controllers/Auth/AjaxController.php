<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Model\SessionTime;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use DB;

class AjaxController extends SiteController {

    public function ajax_add_register_second(Request $request) {
        if ($request->ajax()) {
            $input = $request->input();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            //$name,$gender,$birthdate,$display_name
            $response = $status = 0;
            $wrong_form = $correct_form = NULL;
            $user_data = User::userDataCol('name', $input['name']);
            $newDate = explode('/', $input['birthdate']);
            if (count($newDate) == 3) {
                $input['birthdate'] = trim($newDate[2]) . '-' . trim($newDate[1]) . '-' . trim($newDate[0]);
            } else {
                $input['birthdate'] = $user_data->birthdate;
            }
            $correct_form = $user_data->update($input);
            $user_key = '';
            if ($correct_form) {
                $status = 1;
                $data_user['user_id'] = $user_data->id;
                $user_key = $user_data->name;
                $data_user['user_key'] = $user_key;
                $data_user['register'] = 3;
                $response = view('auth.form_register', $data_user)->render();
            } else {
                $status = 0;
                $data_course['wrong_form'] = $wrong_form;
                $data_course['correct_form'] = $correct_form;
                $response = view('site.layouts.alert_save', compact('wrong_form', 'correct_form'))->render();
            }
            return response()->json(['status' => $status, 'response' => $response, 'user_key' => $user_key]);
        }
    }

    public function ajax_add_register_three(Request $request) {
        if ($request->ajax()) {
            $input = $request->input();
            foreach ($input as $key => $value) {
                $input[$key] = stripslashes(trim(filter_var($value, FILTER_SANITIZE_STRING)));
            }
            //$name,$gender,$birthdate,$display_name
            $response = $status = 0;
            $wrong_form = $correct_form = NULL;
            $user_data = User::userDataCol('name', $input['name']);
            $correct_form = $user_data->update($input);
            $user_key = '';
            if ($correct_form) {
                $status = 1;
                $data_user['user_id'] = $user_data->id;
                $user_key = $user_data->name;
                $data_user['user_key'] = $user_key;
                $data_user['register'] = 4;
                $response = view('auth.form_register', $data_user)->render();
            } else {
                $status = 0;
                $data_course['wrong_form'] = $wrong_form;
                $data_course['correct_form'] = $correct_form;
                $response = view('site.layouts.alert_save', compact('wrong_form', 'correct_form'))->render();
            }
            return response()->json(['status' => $status, 'response' => $response, 'user_key' => $user_key]);
        }
    }
}
