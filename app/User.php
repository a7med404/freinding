<?php

namespace App;

use App\Traits\Followable;
use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use DB;
use Carbon\Carbon;


class User extends Authenticatable {

    use Notifiable,Friendable,EntrustUserTrait,Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'display_name', 'image', 'address', 'phone',
        'is_active', 'site_register', 'country', 'gender', 'social_status', 'address_jop',
        'nationality', 'birthdate', 'occupation', 'about_me',
        'slug'
    ];

    const USERS_IMAGE_PATH = "/storage/images/users/";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function followers(){
    //     return $this->belongsToMany(\Modules\UserSite\Entities\Follower::class, 'followers', 'requester', 'user_requested');
    // }

    public function userMeta() {
        return $this->hasMany(\App\Model\UserMeta::class);
    }

    public function SessionTime() {
        return $this->hasMany(\App\Model\SessionTime::class);
    }

    public function isActive() {
        return Auth::user()->is_active == 1;
    }

    public static function userData($id, $column = 'display_name') {
        $user = static::where('id', $id)->first();
        if (isset($user)) {
            return $user->$column;
        } else {
            return '';
        }
    }

    public static function userDataCol($column = 'display_name', $valColum) {
        $user = static::where($column, $valColum)->first();
        return $user;
    }

    public static function foundUser($name, $column = 'name') {
        $user = static::where($column, $name)->first();
        if (isset($user)) {
            return $user->id;
        } else {
            return 0;
        }
    }

    public function userID($id, $column = 'display_name') {
        $user = static::where('id', $id)->first();
        if (isset($user)) {
            return $user->$column;
        }
    }

    public static function lastMonth($month, $date) {

        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$month, $date])->get();
        return $count[0]->count;
    }

    public static function lastWeek($week, $date) {

        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$week, $date])->get();
        return $count[0]->count;
    }

    public static function lastDay($day, $date) {
        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$day, $date])->get();
        return $count[0]->count;
    }

    public static function countBirthdate($statr_date, $end_date) {
        $count = static::select(DB::raw('COUNT(*)  count'))->where('birthdate', '<=', $statr_date)->where('birthdate', '>=', $end_date)->get();
        return $count[0]->count;
    }

    public static function countAge($colum, $condtion_value, $colum_value) {
        $count = static::select(DB::raw('COUNT(*)  count'))->where($colum, $condtion_value, $colum_value)->get();
        return $count[0]->count;
    }

    public static function countColum($colum, $colum_value) {
        $count = static::select(DB::raw('COUNT(*)  count'))->where($colum, $colum_value)->get();
        return $count[0]->count;
    }

    public static function ALLDataCount($colum = 'country', $state = 0) {
        $data = static::select($colum, DB::raw('count(*) as total'))
                ->groupBy($colum)
                ->get();
        if ($state == 1) {
            $data = static::DataLife($data);
        }
        return $data;
    }

    public static function SendEmailTOUser($user_id, $type = 'register') {
        return true;
    }

    public function getImageAttribute($value) {
        return ($value ? asset(self::USERS_IMAGE_PATH . $value) : asset('storage/images/users/avatar.jpg'));
    }

//********************************

    public static function ALLAgeSum($sum = 1) {
        $alluser = User::get();
        $years = [];
        $total = $total_femal = $total_mal = 0;
        foreach ($alluser as $key => $val_user) {
            if (!empty($val_user->birthdate) && $val_user->birthdate != 'Invalid date') {
                $age = Carbon::parse($val_user->birthdate)->age;
                if ($val_user->gender == 'female') {
                    $total_femal += $age;
                } else {
                    $total_mal += $age;
                }
                $years [] = $age;
            }
        }
        if ($sum == 1) {
            $total = $total_femal + $total_mal;
            return array('total_femal' => $total_femal, 'total_mal' => $total_mal, 'total' => $total);
        } else {
            return $years;
        }
    }

    public static function ALLAgecount() {
        $total = 0;
        $date_current = Carbon::now()->addDay()->toDateString(); //date('Y')
        $date = new \DateTime($date_current);
        $date->sub(new \DateInterval('P4Y'));
        $first_birthdate = $date->format('Y-m-d');

        $date_end = new \DateTime($date_current);
        $date_end->sub(new \DateInterval('P100Y'));
        $end_birthdate = $date_end->format('Y-m-d');
        $total = User::countBirthdate($first_birthdate, $end_birthdate);

        return $total;
    }

    public static function RangeAge($array_age) {
        $date_current = Carbon::now()->subDay()->toDateString();
        //********less than 18-
        $data_val['age'] = '18-';
        $date = new \DateTime();
        $date->sub(new \DateInterval('P17Y'));
        $end_birthdate = $date->format('Y-m-d');
        $data_val['from'] = 'Less Than : ' . $end_birthdate;
        $data_val['to'] = $end_birthdate;
        $data_val['count'] = User::countBirthdate($date_current, $end_birthdate);
        //$data_val['count'] = User::countAge('birthdate', '>', $end_birthdate);
        $data_age[] = $data_val;
        //*********
        $data_val = [];
        foreach ($array_age as $key_age => $val_vale) {
            $date = new \DateTime($date_current);
            $date->sub(new \DateInterval('P' . $key_age . 'Y'));
            $first_birthdate = $date->format('Y-m-d');
            $date_end = new \DateTime($date_current);
            $date_end->sub(new \DateInterval('P' . $val_vale . 'Y'));
            $end_birthdate = $date_end->format('Y-m-d');

            $data_val['age'] = $key_age . ' - ' . $val_vale;
            $data_val['from'] = $first_birthdate;
            $data_val['to'] = $end_birthdate;

            $data_val['count'] = User::countBirthdate($first_birthdate, $end_birthdate);
            $data_age[] = $data_val;
        }
        //********more than 60+
        $data_val = [];
        $data_val['age'] = '60+';
        $date = new \DateTime($date_current);
        $date->sub(new \DateInterval('P61Y'));
        $first_birthdate = $date->format('Y-m-d');

        $data_val['from'] = $first_birthdate;
        $data_val['to'] = 'More Than : ' . $first_birthdate;
        $end_birthdate = '1910-11-30';
        $data_val['count'] = User::countBirthdate($first_birthdate, $end_birthdate);
        //$data_val['count'] = User::countAge('birthdate', '<', $first_birthdate);
        $data_age[] = $data_val;
        return $data_age;
    }

}
