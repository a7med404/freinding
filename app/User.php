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
        'name', 'email', 'password', 'display_name', 'image','address',  'phone',
        'is_active','site_register','country','gender','social_status','address_jop',
        'nationality','birthdate'
    ];

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

    public function categories() {
        return $this->hasMany(\App\Model\Category::class);
    }
    public function posts() {
        return $this->hasMany(\App\Model\Post::class);
    }

    public function isActive() {

        return Auth::user()->is_active == 1;
    }

    public static function userData($id,$column = 'display_name'){
        $user = static::where('id', $id)->first();
        if(isset($user)){
        return $user->$column;
        }
    }
    
    public static function foundUser($name,$column = 'name'){
        $user = static::where($column, $name)->first();
        if(isset($user)){
        return $user->id;
        }else{
         return 0;
        }
    }
    
    public function userID($id,$column = 'display_name'){
        $user = static::where('id', $id)->first();
        if(isset($user)){
        return $user->$column;
        }
    }
    
    public static function lastMonth($month,$date){

        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$month, $date])->get();
        return $count[0]->count;
    }
    
    public static function lastWeek($week,$date){

        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$week, $date])->get();
        return $count[0]->count;
    }
    
    public static function lastDay($day,$date){

        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$day, $date])->get();
        return $count[0]->count;
    }
    
}