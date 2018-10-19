<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //TODO uncomment for just one time seed them and comment them again
//        $this->call(TopicsTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
//        $this->call(PostsTableSeeder::class);
//        $this->call(CommentsTableSeeder::class);
//        $this->call(RepliesTableSeeder::class);
//        $this->call(PostTopicTableSeeder::class);
//        $this->call(SupportFriendTableSeeder::class);
//        $this->call(TaggedFriendTableSeeder::class);
//        $this->call(ReactionTableSeeder::class);
//        $this->call(ReactionReplyTableSeeder::class);
//        $this->call(PostReactionTableSeeder::class);
//        $this->call(CommentReactionTableSeeder::class);

        //new add in 19-10-2018
//        $this->call(OptionsTableSeeder::class);
    }
}
