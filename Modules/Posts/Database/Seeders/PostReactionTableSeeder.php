<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostReactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('post_reactions')->insert(['id' => 1000, 'user_id' => 1000, 'reaction_id' => 1000, 'post_id' => 1000]);
        DB::table('post_reactions')->insert(['id' => 1001, 'user_id' => 1001, 'reaction_id' => 1001, 'post_id' => 1000]);
        DB::table('post_reactions')->insert(['id' => 1002, 'user_id' => 1002, 'reaction_id' => 1002, 'post_id' => 1000]);
        DB::table('post_reactions')->insert(['id' => 1003, 'user_id' => 1000, 'reaction_id' => 1003, 'post_id' => 1001]);
        DB::table('post_reactions')->insert(['id' => 1004, 'user_id' => 1001, 'reaction_id' => 1004, 'post_id' => 1001]);
        DB::table('post_reactions')->insert(['id' => 1005, 'user_id' => 1002, 'reaction_id' => 1004, 'post_id' => 1001]);
        DB::table('post_reactions')->insert(['id' => 1006, 'user_id' => 1000, 'reaction_id' => 1000, 'post_id' => 1002]);
        DB::table('post_reactions')->insert(['id' => 1007, 'user_id' => 1001, 'reaction_id' => 1001, 'post_id' => 1002]);
        DB::table('post_reactions')->insert(['id' => 1008, 'user_id' => 1002, 'reaction_id' => 1001, 'post_id' => 1002]);

    }
}
