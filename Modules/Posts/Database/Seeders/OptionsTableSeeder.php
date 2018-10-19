<?php

namespace Modules\Posts\Database\Seeders;

use App\Model\Options;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Options::create(['option_type' =>'post_long_time','option_key'=>'post_long_time','option_value'=>168,'option_group'=>'posts']);
        Options::create(['option_type' =>'post_short_time','option_key'=>'post_short_time','option_value'=>24,'option_group'=>'posts']);
        Options::create(['option_type' =>'post_character_max_number','option_key'=>'post_character_max_number','option_value'=>5000,'option_group'=>'posts']);
    }
}
