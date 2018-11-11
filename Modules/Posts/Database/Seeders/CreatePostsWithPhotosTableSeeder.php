<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Posts\Entities\Post;

class CreatePostsWithPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Post::create(['id' => 1003, 'user_id' => 1000, 'text' => 'Est lotus capio, cesaris.Cedriums sunt
             decors de varius medicina.Cum cannabis ortum, omnes tabeses gratia camerarius, velox classises.', 'type' => 'picture',
            'dir' => 'ltr', 'view_count' => 50]);

        Post::create(['id' => 1004, 'user_id' => 1001, 'text' => 'A falsis, armarium raptus clabulare.
             Brodium, canis, et amicitia. Cum vox manducare, omnes castores dignus raptus, germanus aususes.', 'type' => 'picture',
            'dir' => 'ltr', 'view_count' => 100]);

        Post::create(['id' => 1005, 'user_id' => 1002, 'text' => 'Tabes undas, tanquam festus racana.
             Ubi est alter lumen? Pius, flavum caniss satis reperire de mirabilis, fatalis verpa.', 'type' => 'picture',
            'dir' => 'ltr', 'view_count' => 150]);

        Post::create(['id' => 1006, 'user_id' => 1000, 'type' => 'picture',
            'dir' => 'ltr', 'view_count' => 50]);

        Post::create(['id' => 1007, 'user_id' => 1001, 'type' => 'picture',
            'dir' => 'ltr', 'view_count' => 100]);

        Post::create(['id' => 1008, 'user_id' => 1002, 'type' => 'picture',
            'dir' => 'ltr', 'view_count' => 150]);
    }
}
