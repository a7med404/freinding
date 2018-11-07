<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReactionForPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
//
        for ($i = 0; $i < 300; $i++) {
            DB::table('post_reactions')->insert(['user_id' => 1000, 'reaction_id' => 1000, 'post_id' => 1000,'created_at'=>'2018-11-01 00:00:00']);
        }
        for ($i = 0; $i < 300; $i++) {
            DB::table('post_reactions')->insert(['user_id' => 1000, 'reaction_id' => 1000, 'post_id' => 1001,'created_at'=>'2018-11-01 00:00:00']);
        }
        for ($i = 0; $i < 300; $i++) {
            DB::table('post_reactions')->insert(['user_id' => 1000, 'reaction_id' => 1000, 'post_id' => 1002,'created_at'=>'2018-11-01 00:00:00']);
        }
    }
}
