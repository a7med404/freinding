<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use DB;

class User extends Authenticatable {

    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'display_name', 'image', 'address', 'phone',
        'is_active', 'site_register', 'country', 'gender', 'social_status', 'address_jop',
        'nationality', 'birthdate', 'occupation', 'about_me'
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
    public static function userDataCol($column = 'display_name',$valColum) {
        $user = static::where($column,$valColum)->first();
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
        $count = static::select(DB::raw('COUNT(*)  count'))->where('birthdate','<=',$statr_date)->where('birthdate','>=',$end_date)->get();
        return $count[0]->count;
    }
    public static function countAge($colum,$condtion_value,$colum_value) {
        $count = static::select(DB::raw('COUNT(*)  count'))->where($colum,$condtion_value,$colum_value)->get();
        return $count[0]->count;
    }
    public static function countColum($colum,$colum_value) {

        $count = static::select(DB::raw('COUNT(*)  count'))->where($colum,$colum_value)->get();
        return $count[0]->count;
    }

    public static function SendEmailTOUser($user_id, $type = 'register') {
        return true;
    }

    public function getImageAttribute($value) {
        return ($value ? asset(self::USERS_IMAGE_PATH . $value) : asset('storage/images/users/avatar.jpg'));
    }


}
