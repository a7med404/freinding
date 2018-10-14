<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReactionReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('reaction_reply')->insert(['id' => 1000, 'user_id' => 1000, 'reaction_id' => 1000, 'reply_id' => 1000]);
        DB::table('reaction_reply')->insert(['id' => 1001, 'user_id' => 1001, 'reaction_id' => 1001, 'reply_id' => 1001]);
        DB::table('reaction_reply')->insert(['id' => 1002, 'user_id' => 1002, 'reaction_id' => 1002, 'reply_id' => 1002]);
        DB::table('reaction_reply')->insert(['id' => 1003, 'user_id' => 1000, 'reaction_id' => 1003, 'reply_id' => 1003]);
        DB::table('reaction_reply')->insert(['id' => 1004, 'user_id' => 1001, 'reaction_id' => 1004, 'reply_id' => 1004]);
        DB::table('reaction_reply')->insert(['id' => 1005, 'user_id' => 1002, 'reaction_id' => 1004, 'reply_id' => 1005]);
        DB::table('reaction_reply')->insert(['id' => 1006, 'user_id' => 1000, 'reaction_id' => 1000, 'reply_id' => 1006]);
        DB::table('reaction_reply')->insert(['id' => 1007, 'user_id' => 1001, 'reaction_id' => 1001, 'reply_id' => 1007]);
        DB::table('reaction_reply')->insert(['id' => 1008, 'user_id' => 1002, 'reaction_id' => 1002, 'reply_id' => 1008]);
        DB::table('reaction_reply')->insert(['id' => 1009, 'user_id' => 1000, 'reaction_id' => 1003, 'reply_id' => 1009]);
        DB::table('reaction_reply')->insert(['id' => 1010, 'user_id' => 1001, 'reaction_id' => 1004, 'reply_id' => 1010]);
        DB::table('reaction_reply')->insert(['id' => 1011, 'user_id' => 1002, 'reaction_id' => 1004, 'reply_id' => 1011]);
        DB::table('reaction_reply')->insert(['id' => 1012, 'user_id' => 1000, 'reaction_id' => 1000, 'reply_id' => 1011]);
        DB::table('reaction_reply')->insert(['id' => 1013, 'user_id' => 1001, 'reaction_id' => 1001, 'reply_id' => 1010]);
        DB::table('reaction_reply')->insert(['id' => 1014, 'user_id' => 1002, 'reaction_id' => 1002, 'reply_id' => 1009]);
        DB::table('reaction_reply')->insert(['id' => 1015, 'user_id' => 1000, 'reaction_id' => 1003, 'reply_id' => 1008]);
        DB::table('reaction_reply')->insert(['id' => 1016, 'user_id' => 1001, 'reaction_id' => 1004, 'reply_id' => 1007]);
        DB::table('reaction_reply')->insert(['id' => 1017, 'user_id' => 1002, 'reaction_id' => 1004, 'reply_id' => 1006]);
        DB::table('reaction_reply')->insert(['id' => 1018, 'user_id' => 1000, 'reaction_id' => 1000, 'reply_id' => 1005]);
        DB::table('reaction_reply')->insert(['id' => 1019, 'user_id' => 1001, 'reaction_id' => 1001, 'reply_id' => 1004]);
        DB::table('reaction_reply')->insert(['id' => 1020, 'user_id' => 1002, 'reaction_id' => 1002, 'reply_id' => 1003]);
        DB::table('reaction_reply')->insert(['id' => 1021, 'user_id' => 1000, 'reaction_id' => 1003, 'reply_id' => 1002]);
        DB::table('reaction_reply')->insert(['id' => 1022, 'user_id' => 1001, 'reaction_id' => 1004, 'reply_id' => 1001]);
        DB::table('reaction_reply')->insert(['id' => 1023, 'user_id' => 1002, 'reaction_id' => 1004, 'reply_id' => 1000]);
    }
}
