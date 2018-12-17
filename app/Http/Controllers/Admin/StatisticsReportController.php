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
        $title = 'Public Statistics';
        $month = Carbon::now()->subMonth()->toDateString();
        $week = Carbon::now()->subWeek()->toDateString();
        $day = Carbon::now()->subDay()->toDateString();
        $date = Carbon::now()->addDay()->toDateString();
        $start_year = date('Y') . '-01-01';
        $end_year = date('Y') . '-12-31';
        //user
        $user_count = User::count();
        $user_count_month = User::lastMonth($month, $date);
        $user_count_week = User::lastMonth($week, $date);
        $user_count_day = User::lastDay($day, $date);
        $user_year = User::lastDay($start_year, $end_year);
        $male_count = User::countColum('gender', 'male');
        $femal_count = User::countColum('gender', 'female');
        $user_male = round(($male_count/$user_count)*100,2);
        $user_female = round(($femal_count/$user_count)*100,2);
        //hour
        $morning_count = SessionTime::lastHour('06:00:00', '12:00:00');
        $afternoon_count = SessionTime::lastHour('12:00:01', '18:00:00');
        $night_count = SessionTime::lastHour('18:00:01', '23:59:59.999999');
        $midnight_count = SessionTime::lastHour('00:00:01', '05:59:59.999999');
        //day
        $saturday_count = SessionTime::countDay('Sat');
        $Sunday_count = SessionTime::countDay('Sun');
        $Monday_count = SessionTime::countDay('Mon');
        $Tuesday_count = SessionTime::countDay('Tue');
        $Wednesday_count = SessionTime::countDay('Wed');
        $Thursday_count = SessionTime::countDay('Thu');
        $Friday_count = SessionTime::countDay('Fri');
        //month
        $total_month = SessionTime::ALLDataMonth(1,2);
        $new_month = SessionTime::ALLDataMonth(1);
        
        //age
        $total_sum = User::ALLAgeSum(1);
        $age_avg = round(($total_sum['total']/$user_count),0);
        $age_male = round(($total_sum['total_mal']/$male_count),0);
        $age_female = round(($total_sum['total_femal']/$femal_count),0);
        $array_age = [18 => 24, 25 => 35, 36 => 60];  //18-,60+
        $data_age = User::RangeAge($array_age);
        //lifeTime
        $data_life = SessionTime::ALLDataLifeTime(1);//91-365day,+365day,0-90day
        $data_city = User::ALLDataCount('address');
        $data_nationality = User::ALLDataCount('nationality');
//         print_r($data_age);die;
        return view('admin.statistics.users', compact(
                        'title', 'user_count', 'user_count_month', 'user_count_week', 'user_count_day', 'user_year', 'user_male', 'user_female', 'age_avg', 'age_male', 'age_female', 'morning_count', 'afternoon_count', 'night_count', 'midnight_count', 'saturday_count', 'Sunday_count', 'Monday_count', 'Tuesday_count', 'Wednesday_count', 'Thursday_count', 'Friday_count', 'total_month', 'new_month', 'data_life', 'data_age', 'data_city', 'data_nationality'
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
        $Sunday_count = SessionTime::countDay('Sun');
        $Monday_count = SessionTime::countDay('Mon');
        $Tuesday_count = SessionTime::countDay('Tue');
        $Wednesday_count = SessionTime::countDay('Wed');
        $Thursday_count = SessionTime::countDay('Thu');
        $Friday_count = SessionTime::countDay('Fri');
        //month
        $data_month = $data_year = [];
        for ($month = 1; $month <= 9; $month++) {
            $month_num = '0' . $month;
            $num = '-' . $month_num;
            $data_month[] = SessionTime::DataMonth($month_num, $num);
        }
        for ($last_month = 10; $last_month <= 12; $last_month++) {
            $month_num = '-' . $last_month;
            $data_month[] = SessionTime::DataMonth($last_month, $month_num);
        }
        //year
        $first_row = SessionTime::get_FirstRow();
        $year_end = $yearFirst = date('Y');
        if (isset($first_row->created_at)) {
            $yearFirst = Carbon::parse($first_row->created_at)->format('Y');
        }
        for ($year = $yearFirst; $year <= $year_end; $year++) {
            $data_year[] = SessionTime::DataYear($year);
        }

        return view('admin.statistics.register', compact(
                        'title', 'morning_count', 'afternoon_count', 'night_count', 'midnight_count'
                        , 'saturday_count', 'Sunday_count', 'Monday_count', 'Tuesday_count', 'Wednesday_count'
                        , 'Thursday_count', 'Friday_count', 'data_month', 'data_year'
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
        $data_age = [];

        $male_count = User::countColum('gender', 'male');
        $femal_count = User::countColum('gender', 'female');

        $array_age = [18 => 24, 25 => 35, 36 => 45, 36 => 45, 46 => 60];
        $date_current = Carbon::now()->addDay()->toDateString(); //date('Y')
        //********less than 18-
        $data_val['age'] = '18-';
        $date = new \DateTime($date_current);
        $date->sub(new \DateInterval('P17Y'));
        $end_birthdate = $date->format('d/m/Y');
        $data_val['from'] = 'Less Than : ' . $end_birthdate;
        $data_val['to'] = $end_birthdate;
        $data_val['count'] = User::countAge('birthdate', '>', $end_birthdate);
        $data_age[] = $data_val;
        //*********
        $data_val = [];
        foreach ($array_age as $key_age => $val_vale) {
            $date = new \DateTime($date_current);
            $date->sub(new \DateInterval('P' . $key_age . 'Y'));
            $first_birthdate = $date->format('d/m/Y');

            $date_end = new \DateTime($date_current);
            $date_end->sub(new \DateInterval('P' . $val_vale . 'Y'));
            $end_birthdate = $date_end->format('d/m/Y');


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
        $first_birthdate = $date->format('d/m/Y');

        $data_val['from'] = $first_birthdate;
        $data_val['to'] = 'More Than : ' . $first_birthdate;
        $data_val['count'] = User::countAge('birthdate', '<', $first_birthdate);
        $data_age[] = $data_val;
        //*********
        return view('admin.statistics.age_gender', compact(
                        'title', 'data_age', 'male_count', 'femal_count'
        ));
    }

//********************************report of site**************************************
    public function test() {
        if (!$this->user->can('access-all')) {
            return $this->pageUnauthorized();
        }
        $image = $video = '';

        return view('admin.test.create', compact('image', 'video'));
    }

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
