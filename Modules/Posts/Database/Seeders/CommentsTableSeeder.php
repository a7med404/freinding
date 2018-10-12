<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Posts\Entities\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Comment::create(['id' => 1000, 'user_id' => 1000,'post_id'=>1000, 'text' => 'Est lotus capio, cesaris.Cedriums sunt
             decors de varius medicina.Cum cannabis ortum, omnes tabeses gratia camerarius, velox classises.']);

        Comment::create(['id' => 1001, 'user_id' => 1001,'post_id'=>1001, 'text' => 'A falsis, armarium raptus clabulare.
             Brodium, canis, et amicitia. Cum vox manducare, omnes castores dignus raptus, germanus aususes.']);

        Comment::create(['id' => 1002, 'user_id' => 1002,'post_id'=>1002, 'text' => 'Tabes undas, tanquam festus racana.
             Ubi est alter lumen? Pius, flavum caniss satis reperire de mirabilis, fatalis verpa.']);

        Comment::create(['id' => 1003, 'user_id' => 1000, 'post_id' => 1002, 'text' => 'Est lotus capio, cesaris.Cedriums sunt
             decors de varius medicina.Cum cannabis ortum, omnes tabeses gratia camerarius, velox classises.']);

        Comment::create(['id' => 1004, 'user_id' => 1001, 'post_id' => 1001, 'text' => 'A falsis, armarium raptus clabulare.
             Brodium, canis, et amicitia. Cum vox manducare, omnes castores dignus raptus, germanus aususes.']);

        Comment::create(['id' => 1005, 'user_id' => 1002, 'post_id' => 1000, 'text' => 'Tabes undas, tanquam festus racana.
             Ubi est alter lumen? Pius, flavum caniss satis reperire de mirabilis, fatalis verpa.']);
    }
}
