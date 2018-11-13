<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Posts\Entities\File;

class AddVideosFilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        File::create(['dependent_id' => 1009, 'type' => 'post','real_name' => '1', 'store_name' => '1', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1010, 'type' => 'post','real_name' => '2', 'store_name' => '2', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1011, 'type' => 'post','real_name' => '3', 'store_name' => '3', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1012, 'type' => 'post','real_name' => '4', 'store_name' => '4', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1013, 'type' => 'post','real_name' => '5', 'store_name' => '5', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1014, 'type' => 'post','real_name' => '6', 'store_name' => '6', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1015, 'type' => 'post','real_name' => '1', 'store_name' => '1', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1016, 'type' => 'post','real_name' => '2', 'store_name' => '2', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1017, 'type' => 'post','real_name' => '3', 'store_name' => '3', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1018, 'type' => 'post','real_name' => '4', 'store_name' => '4', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1019, 'type' => 'post','real_name' => '5', 'store_name' => '5', 'extension' => 'mp4']);
        File::create(['dependent_id' => 1020, 'type' => 'post','real_name' => '6', 'store_name' => '6', 'extension' => 'mp4']);
    }
}
