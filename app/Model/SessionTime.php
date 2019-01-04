<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class SessionTime extends Model {

    protected $table = 'session_times';
    protected $fillable = [
        'user_id', 'session_id', 'start_time', 'last_activity_time'
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
    public static function ALLDataLifeTime($state = 0) {
        $data = static::select('user_id', DB::raw('count(*) as total'))
                ->groupBy('user_id')
                ->get();
        if ($state == 1) {
            $data = static::DataLife($data);
        }
        return $data;
    }

    public static function DataLife($data) {
        $range_min = $range_mid = $range_max = 0; //91-365day,+365day,0-90day
        foreach ($data as $key => $value) {
            if ($value->total <= 90) {
                $range_min += 1;
            } elseif ($value->total >= 91 && $value->total <= 365) {
                $range_mid += 1;
            } else {
                $range_max += 1;
            }
        }

        return array($range_mid, $range_max, $range_min);
    }

    public static function DataMonth($month_num, $num, $state = 0, $all = 0) {
        if ($all == 1) {
            $start_date = '2018-01-01';
        } elseif ($all == 2) {
            $start_date = date('Y') . '-01-01';
        } else {
            $start_date = date('Y') . $num . '-01';
        }
        $end_date = date('Y') . $num . '-31';
        if ($state == 0) {
            $vat_data['month'] = stringMonth_number($month_num);
            $vat_data['from'] = $start_date;
            $vat_data['to'] = $end_date;
            $vat_data['count'] = static::lastMonth($start_date, $end_date);
        } else {
            $vat_data =static::lastMonth($start_date, $end_date);
        }
        return $vat_data;
    }

    public static function ALLDataMonth($state = 0, $all = 0) {
        $data_month = [];
        for ($month = 1; $month <= 9; $month++) {
            $month_num = '0' . $month;
            $num = '-' . $month_num;
            $data_month[] = SessionTime::DataMonth($month_num, $num, $state, $all);
        }
        for ($last_month = 10; $last_month <= 12; $last_month++) {
            $month_num = '-' . $last_month;
            $data_month[] = SessionTime::DataMonth($last_month, $month_num, $state, $all);
        }
        return $data_month;
    }

    public static function DataYear($year_num, $state = 0) {
        $start_date = $year_num . '-01-01';
        $end_date = $year_num . '-12-31';
        if ($state == 0) {
            $vat_data['year'] = $year_num;
            $vat_data['from'] = $start_date;
            $vat_data['to'] = $end_date;
            $vat_data['count'] = static::lastMonth($start_date, $end_date);
        } else {
            $vat_data = static::lastMonth($start_date, $end_date);
        }
        return $vat_data;
    }

    public static function ALLDataYear($state = 0) {
        $data_year = [];
        //year
        $first_row = SessionTime::get_FirstRow();
        $year_end = $yearFirst = date('Y');
        if (isset($first_row->created_at)) {
            $yearFirst = Carbon::parse($first_row->created_at)->format('Y');
        }
        for ($year = $yearFirst; $year <= $year_end; $year++) {
            $data_year[] = SessionTime::DataYear($year, $state);
        }
        return $data_year;
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
