<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Posts\Entities\PostTopic;

class PostTopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        PostTopic::create(['id' => 1000, 'post_id' =>1000,'topic_id'=>1000]);
        PostTopic::create(['id' => 1001, 'post_id' =>1001,'topic_id'=>1000]);
        PostTopic::create(['id' => 1002, 'post_id' =>1002,'topic_id'=>1000]);

        PostTopic::create(['id' => 1003, 'post_id' =>1000,'topic_id'=>1001]);
        PostTopic::create(['id' => 1004, 'post_id' =>1001,'topic_id'=>1002]);
        PostTopic::create(['id' => 1005, 'post_id' =>1002,'topic_id'=>1003]);

        PostTopic::create(['id' => 1006, 'post_id' =>1000,'topic_id'=>1004]);
        PostTopic::create(['id' => 1007, 'post_id' =>1001,'topic_id'=>1005]);
        PostTopic::create(['id' => 1008, 'post_id' =>1002,'topic_id'=>1002]);
    }
}
