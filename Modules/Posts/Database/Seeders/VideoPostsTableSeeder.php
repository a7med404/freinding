<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Posts\Entities\Post;

class VideoPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Post::create(['id' => 1009, 'user_id' => 1000, 'text' => 'Est lotus capio, cesaris.Cedriums sunt
             decors de varius medicina.Cum cannabis ortum, omnes tabeses gratia camerarius, velox classises.', 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 50]);

        Post::create(['id' => 1010, 'user_id' => 1001, 'text' => 'A falsis, armarium raptus clabulare.
             Brodium, canis, et amicitia. Cum vox manducare, omnes castores dignus raptus, germanus aususes.', 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 100]);

        Post::create(['id' => 1011, 'user_id' => 1002, 'text' => 'Tabes undas, tanquam festus racana.
             Ubi est alter lumen? Pius, flavum caniss satis reperire de mirabilis, fatalis verpa.', 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 150]);

        Post::create(['id' => 1012, 'user_id' => 1001, 'text' => 'A falsis, armarium raptus clabulare.
             Brodium, canis, et amicitia. Cum vox manducare, omnes castores dignus raptus, germanus aususes.', 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 100]);

        Post::create(['id' => 1013, 'user_id' => 1002, 'text' => 'Tabes undas, tanquam festus racana.
             Ubi est alter lumen? Pius, flavum caniss satis reperire de mirabilis, fatalis verpa.', 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 150]);

        Post::create(['id' => 1014, 'user_id' => 1000, 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 50]);

        Post::create(['id' => 1015, 'user_id' => 1001, 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 100]);

        Post::create(['id' => 1016, 'user_id' => 1002, 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 150]);

        Post::create(['id' => 1017, 'user_id' => 1001, 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 100]);

        Post::create(['id' => 1018, 'user_id' => 1002, 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 150]);

        Post::create(['id' => 1019, 'user_id' => 1002, 'text' => 'Tabes undas, tanquam festus racana.
             Ubi est alter lumen? Pius, flavum caniss satis reperire de mirabilis, fatalis verpa.', 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 150]);

        Post::create(['id' => 1020, 'user_id' => 1002, 'type' => 'video',
            'dir' => 'ltr', 'view_count' => 150]);
    }
}
