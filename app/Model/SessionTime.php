<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class SessionTime extends Model {

    protected $table = 'session_times';
    protected $fillable = [
        'user_id', 'hour_out', 'hour_in', 'day_name'
    ];

    public function user() {
        return $this->belongsTo(\App\User::class);
    }

    public static function InsertData($user_id) {
        $input['user_id'] = $user_id;
        $date = strtotime(time());
        $input['day_name'] = date('D', time());
        $input['hour_in'] = date('H:i:s'); //date('H:i:s', time());
        SessionTime::create($input);
        return True;
    }

    public function deleteMeta($user_id) {
        return static::where('user_id', $user_id)->delete();
    }

    public static function get_FirstRow() {
        $data = static::orderBy('id', 'ASC')->first();
        return $data;
    }

    public static function get_LastRow($user_id) {
        $data = static::where('user_id', $user_id)->orderBy('id', 'DESC')->first();
        return $data;
    }

    public static function getSessionTime($user_id, $col = '', $val = '') {
        $data = static::where('user_id', $user_id);
        if (!empty($col)) {
            $result = $data->where($col, $val);
        }
        $result = $data->orderBy('id', 'DESC')->first();
        return $result;
    }

    public static function getSessionTimes($user_id, $col = '', $val = '') {
        $data = static::where('user_id', $user_id);
        if (!empty($col)) {
            $result = $data->where($col, $val);
        }
        $result = $data->get();
        return $result;
    }

    public static function countDay($day_name) {
        $count = static::select(DB::raw('COUNT(*)  count'))->where('day_name', $day_name)->get();
        return $count[0]->count;
    }

    public static function lastHour($start_time, $end_time) {
        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('hour_in'), [$start_time, $end_time])->get();
        return $count[0]->count;
    }

    public static function lastTime($start_time, $end_time) {
        $start = '2018-11-15 ' . $start_time;
        $end = '3000-12-31 ' . $end_time;
//        $start='2018-11-16 12:17:54.921525';
//       $end='2018-11-16 23:59:59.999999';
        $count = static::select(DB::raw('COUNT(*)  count'))->whereBetween(DB::raw('created_at'), [$start, $end])->get();
        return $count[0]->count;
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

    public static function lastYear($year, $month) {
        $post = static::whereYear('created_at', '=', $year)
                ->whereMonth('created_at', '=', $month)
                ->get();
    }

    public static function GetYear($day, $date) {
        $data = static::select('id', 'title', 'created_at')
                ->get()
                ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y'); // grouping by years
            //return Carbon::parse($date->created_at)->format('m'); // grouping by months
        });
    }

    //********************************************   
    public static function DataMonth($month_num, $num) {
        $vat_data['month'] = stringMonth_number($month_num);
        $vat_data['from'] = $start_date = date('Y') . $num . '-01';
        $vat_data['to'] = $end_date = date('Y') . $num . '-31';
        $vat_data['count'] = static::lastMonth($start_date, $end_date);
        return $vat_data;
    }

    public static function DataYear($year_num) {
        $vat_data['year'] = $year_num;
        $vat_data['from'] = $start_date = $year_num . '-01-01';
        $vat_data['to'] = $end_date = $year_num . '-12-31';
        $vat_data['count'] = static::lastMonth($start_date, $end_date);
        return $vat_data;
    }

}

//$start_time = Carbon::yesterday('UTC');
//$end_time = Carbon::yesterday('UTC')->endOfDay();
//$start_time = Carbon::now('UTC');
//$end_time = Carbon::now('UTC')->endOfDay();
//print_r($start_time);
//print_r($end_time);
//$start_time = Carbon::yesterday('UTC')->timezone('EST');
//$end_time = Carbon::yesterday('UTC')->endOfDay()->timezone('EST');
