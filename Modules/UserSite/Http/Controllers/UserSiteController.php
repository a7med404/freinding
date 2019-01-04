<?php

namespace Modules\UserSite\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Site\SiteController; //as SiteController
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;
use App\User;
use Session;
use DB;
use App\Model\SessionTime;
use App\Model\SaveSession;
use App\Model\ProfileStage;
use App\Model\UsersIds;
use App\Model\World;
use File;
use Redirect;

//use App\Model\Options;
class UserSiteController extends SiteController
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
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
            $verstatus = UsersIds::where('user_id', Auth::user()->id)->first();
            return view('usersite::index', compact('prof', 'form_type', 'user', 'admin_panel', 'user_key', 'verstatus'));
        } else {
            return redirect()->route('close');
        }
    }

    public function profileSetting()
    {
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

            $verstatus = UsersIds::where('user_id', Auth::user()->id)->first();
            $countries = World::distinct()->orderBy('country')->get(['country']);
            $cities=World::select('city_ascii')->distinct()->where('country',Auth::user()->nationality)->get();


            return view('usersite::setting', compact('prof', 'form_type', 'user', 'admin_panel', 'user_key', 'correct_form', 'wrong_form','verstatus','countries','cities'));
        } else {
            return redirect()->route('close');
        }
    }

    public function changepasswordSetting()
    {
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
    public function storeSetting(Request $request)
    {
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

    public function countSetting()
    {
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

    public function storeCount(Request $request)
    {
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
    public function create()
    {
        return view('usersite::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('usersite::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('usersite::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {

    }

    public function statistics()
    {
        $month = date('m', strtotime(now()));
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $acc_create_time = User::select('created_at')->where('id', $user_id)->where('is_active', 1)->first();

        $sessionsnum = DB::table('session_times as w')
            ->select(array(DB::Raw('COUNT(w.id) as Row_count'), DB::Raw('DATE(w.created_at) day'), DB::Raw('w.user_id as user_id')))->where('user_id', $user_id)
            ->where(DB::Raw('MONTH(w.created_at)'), $month)
            ->groupBy('day')
            ->orderBy('w.created_at')
            ->get()->toArray();


        $session_duration = SaveSession::select('start_time', 'last_activity_time')->where('user_id', $user_id)->where(DB::Raw('MONTH(created_at)'), $month)->get();
        $array = array();
        foreach ($session_duration as $sessiondu) {
            $date = Date('d-m-Y', strtotime($sessiondu->start_time));
            $start = strtotime($sessiondu->start_time);
            $last = strtotime($sessiondu->last_activity_time);
            $minutes = intval(($last - $start) / 60);

            array_push($array, array($date, $minutes));
        }

//get sum every day
//        $out = array();
//        foreach ($array as $row) {
//            if (!isset($out[$row['0']])) {
//                $out[$row['0']] = array(
//                    '0' => $row['0'],
//                    '1' => 0,
//                );
//
//            }
//            $out[$row['0']]['1'] += $row['1'];
//        }
//        $out = array_values($out);

        //-------------------------

        //get averaage-------------------

        $tmp = array();
        foreach ($array as $entry) {
            $date = $entry[0];

            if (!array_key_exists($date, $tmp)) {
                $tmp[$date] = array();
            }
            $tmp[$date][] = $entry[1];
        }

        $averages = array();
        foreach ($tmp as $date => $places) {
            $sum = array_sum($places);
            $averages[] = array(
                "date" => $date,
                "average" => intval($sum / count($places))
            );
        }
        $now = strtotime(now());
        $created_at = strtotime($acc_create_time->created_at->toDateTimeString());
        $lifetime = $now - $created_at;
        $account_lifetim = intval(intval($lifetime) / (3600 * 24));


        return view('usersite::statistics', compact('user', 'averages', 'sessionsnum', 'account_lifetim'));
    }

    public function save_activity()
    {
        $session_id = Session::getId();
        $user_id = Auth::user()->id;
        $currenttime = now();
        $user = SaveSession::where('session_id', '=', $session_id)->first();
        if ($user === null) {
            $input['user_id'] = $user_id;
            $input['session_id'] = $session_id;
            $input['start_time'] = $currenttime;
            $input['last_activity_time'] = $currenttime;
            SaveSession::create($input);
        } else {
            SaveSession::where('user_id', $user_id)
                ->where('session_id', $session_id)
                ->update(['last_activity_time' => $currenttime]);
        }
    }

    public function getverify()
    {
        $user_id = Auth::user()->id;
        $user = Auth::user();
        $checkuserimageid = UsersIds::where('user_id', $user_id)->first();

        return view('usersite::verifyid', compact('user', 'checkuserimageid'));
    }


    public function postid(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validation->passes()) {
            $image = $request->file('select_file');
            $new_name = rand() . '_' . Auth::user()->id . '_.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/images/ids'), $new_name);
            $input['user_id'] = Auth::user()->id;
            $input['id_image'] = 'storage/images/ids/' . $new_name;
            $input['status'] = 'underprocess';
            $id_image = UsersIds::where('user_id', '=', Auth::user()->id)->first();
            if ($id_image === null) {
                UsersIds::create($input);
                return response()->json([
                    'message' => 'Image Upload Successfully',
                    'src' => '/users_ids/' . $new_name,
                    'class_name' => 'alert-success'
                ]);
            } else {
                $image_path = $id_image->id_image;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                UsersIds::where('user_id', Auth::user()->id)
                    ->update(['id_image' => $input['id_image'], 'status' => 'underprocess']);
                return response()->json([
                    'message' => 'Image Uploaded Successfully',
                    'src' => '/users_ids/' . $new_name,
                    'class_name' => 'alert-success'
                ]);

            }

        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

    public function getstage()
    {

        $user_id = Auth::user()->id;
        $user = Auth::user();
        $checkprofilestage = ProfileStage::where('user_id', $user_id)->first();
        return view('usersite::stage', compact('user', 'checkprofilestage'));

    }

    public function poststage(Request $request)
    {
        $stage = $request->stage;
        $user_id = Auth::user()->id;
        $checkuser = ProfileStage::where('user_id', '=', $user_id)->first();
        if ($checkuser === null) {
            $input['user_id'] = Auth::user()->id;
            $input['stage'] = $stage;
            ProfileStage::create($input);
        } else {
            ProfileStage::where('user_id', Auth::user()->id)
                ->update(['stage' => $stage]);

        }
        return response()->json([
            'message' => 'Stage updated successfully',
            'class_name' => 'alert-success'
        ]);
    }


    public function step_two()
    {
        $users = User::where('id', Auth::user()->id)->first();
        if (!empty($users->birthdate)) {
            return redirect('registration_three');
        }
        return view('usersite::Auth.registration_two');
    }

    public function step_three()
    {
        $users = User::where('id', Auth::user()->id)->first();
        if (!empty($users->nationality)) {
            return redirect('suggestion_friends');
        }

        $countries = World::distinct()->orderBy('country')->get(['country']);
        return view('usersite::Auth.registration_three', compact('countries'));
    }

    public function updateusertwo(request $request)
    {
        $validation = Validator::make($request->all(), [
            'profileimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nickname' => 'required|min:2|max:100',
        ]);
        if ($validation->passes()) {
            if ($request->file('profileimage')) {
                $image = $request->file('profileimage');
                $new_name = rand() . '_' . Auth::user()->id . '_.' . $image->getClientOriginalExtension();
                $imagename = $new_name;
                $image->move(public_path('storage/images/users'), $new_name);
            } else {
                $imagename = "default.png";
            }
            
            $date1 = strtr($request->datetimepicker, '/', '-');

            $birthdate = date("Y-m-d", strtotime($date1));
            $nickname=$request->nickname;
            User::where('id', Auth::user()->id)
                ->update(['image' => $imagename, 'birthdate' => $birthdate, 'gender' => $request->gendar, 'display_name' => $nickname]);
            return redirect('posts');

        } else {
            return Redirect::back()->withErrors([$validation->errors()->all()]);
        }
    }


    public function updateuserthree(request $request)
    {
        $validation = Validator::make($request->all(), [
            'relationship' => 'required',
            'nationality' => 'required',
            'livingcity' => 'required',
        ]);
        if ($validation->passes()) {
            User::where('id', Auth::user()->id)
                ->update(['social_status' => $request->relationship, 'nationality' => $request->nationality, 'country' => $request->livingcity]);
            return redirect('suggestion_friends');

        } else {
            return Redirect::back()->withErrors([$validation->errors()->all()]);
        }
    }

    public function suggestionfriends()
    {
        return view('usersite::Auth.suggestion');
    }

    public function getcities()
    {
        $country = $_GET['country'];
        $cities = World::where('country', $country)->orderBy('city_ascii')->get();
        $result = $cities->toArray();

        return $result;

    }

}
