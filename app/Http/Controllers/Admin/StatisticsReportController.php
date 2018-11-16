<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Model\Options;
use App\Role;
use App\User;
use App\Model\SessionTime;
use Carbon\Carbon;

class StatisticsReportController extends AdminController {

    public function homeAdmin() {
        if ($this->user->can('access-all')) {
            return $this->statisticsUsers();
//        } elseif ($this->user->can('post*')) {
//            return $this->statisticsPublic();
        } else {
            return redirect()->route('admin.users.edit', [$this->user->id]);
        }
    }

//********************************statistics of site**************************************

    public function statisticsUsers() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $title = 'Public Users Statistics';
        $month = Carbon::now()->subMonth()->toDateString();
        $week = Carbon::now()->subWeek()->toDateString();
        $day = Carbon::now()->subDay()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();

        $user_count = User::count();

        $user_count_month = User::lastMonth($month, $date);

        $user_count_week = User::lastMonth($week, $date);

        $user_count_day = User::lastDay($day, $date);

        return view('admin.statistics.users', compact(
                        'title', 'user_count', 'user_count_month', 'user_count_week', 'user_count_day'
        ));
    }

    public function statisticsregisters() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $title = ' Registration Period Type Statistics';
        //hour
        $morning_count = SessionTime::lastHour('06:00:00', '12:00:00');
        $afternoon_count = SessionTime::lastHour('12:00:01', '18:00:00');
        $night_count = SessionTime::lastHour('18:00:01', '23:59:59.999999');
        $midnight_count = SessionTime::lastHour('00:00:01', '05:59:59.999999');
        //day
        $saturday_count = SessionTime::countDay('Sat');
        $Sunday_count =SessionTime::countDay('Sun');
        $Monday_count = SessionTime::countDay('Mon');
        $Tuesday_count = SessionTime::countDay('Tue');
        $Wednesday_count = SessionTime::countDay('Wed');
        $Thursday_count = SessionTime::countDay('Thu');
        $Friday_count = SessionTime::countDay('Fri');
        //month
        $month = Carbon::now()->subMonth()->toDateString();
        $week = Carbon::now()->subWeek()->toDateString();
        $day = Carbon::now()->subDay()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();

        $user_count = User::count();
        $user_count_month = User::lastMonth($month, $date);
        $user_count_week = User::lastMonth($week, $date);
        $user_count_day = User::lastDay($day, $date);


        return view('admin.statistics.register', compact(
                        'title', 'morning_count', 'afternoon_count', 'night_count', 'midnight_count'
                        , 'saturday_count', 'Sunday_count', 'Monday_count', 'Tuesday_count', 'Wednesday_count'
                        , 'Thursday_count', 'Friday_count'
                        , 'user_count', 'user_count_month', 'user_count_week', 'user_count_day'
        ));
    }

    public function statisticslifetime() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $title = 'Lifetime type Statistics';
        $user_id = 1;
        $month = Carbon::now()->subMonth()->toDateString();
        $week = Carbon::now()->subWeek()->toDateString();
        $day = Carbon::now()->subDay()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();

        $user_count = User::count();

        $user_count_month = User::lastMonth($month, $date);

        $user_count_week = User::lastMonth($week, $date);

        $user_count_day = User::lastDay($day, $date);

        return view('admin.statistics.lifetime', compact(
                        'title', 'user_count', 'user_count_month', 'user_count_week', 'user_count_day'
        ));
    }

    public function statistics_ageGender() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $title = 'Age/Gender type Statistics';
        $user_id = 1;
        $month = Carbon::now()->subMonth()->toDateString();
        $week = Carbon::now()->subWeek()->toDateString();
        $day = Carbon::now()->subDay()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();

        $user_count = User::count();

        $user_count_month = User::lastMonth($month, $date);

        $user_count_week = User::lastMonth($week, $date);

        $user_count_day = User::lastDay($day, $date);

        return view('admin.statistics.age_gender', compact(
                        'title', 'user_count', 'user_count_month', 'user_count_week', 'user_count_day'
        ));
    }

//********************************report of site**************************************
    public function statisticsPublic() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $user_id = 1;
        $month = Carbon::now()->subMonth()->toDateString();
        $week = Carbon::now()->subWeek()->toDateString();
        $day = Carbon::now()->subDay()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();

        return view('admin.statistics.public', compact('user_id'));
    }

}
