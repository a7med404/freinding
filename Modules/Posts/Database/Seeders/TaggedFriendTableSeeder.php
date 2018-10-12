<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Posts\Entities\TaggedFriend;

class TaggedFriendTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        TaggedFriend::create(['id' => 1000, 'post_id' =>1000,'user_id'=>1000]);
        TaggedFriend::create(['id' => 1001, 'post_id' =>1000,'user_id'=>1001]);
        TaggedFriend::create(['id' => 1002, 'post_id' =>1000,'user_id'=>1002]);

        TaggedFriend::create(['id' => 1003, 'post_id' =>1001,'user_id'=>1000]);
        TaggedFriend::create(['id' => 1004, 'post_id' =>1001,'user_id'=>1001]);
        TaggedFriend::create(['id' => 1005, 'post_id' =>1001,'user_id'=>1002]);

        TaggedFriend::create(['id' => 1006, 'post_id' =>1002,'user_id'=>1000]);
        TaggedFriend::create(['id' => 1007, 'post_id' =>1002,'user_id'=>1001]);
        TaggedFriend::create(['id' => 1008, 'post_id' =>1002,'user_id'=>1002]);
    }
}
