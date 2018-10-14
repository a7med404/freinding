<?php

namespace Modules\Posts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Posts\Entities\Reaction;

class ReactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Reaction::create(['id'=>1000,'name_en'=>'أسعدني','name_ar'=>'happy','icon'=>'happy.png','is_active'=>1]);
        Reaction::create(['id'=>1001,'name_en'=>'أحببته','name_ar'=>'love','icon'=>'love.png','is_active'=>1]);
        Reaction::create(['id'=>1002,'name_en'=>'فاجأني','name_ar'=>'surprise','icon'=>'surprise.png','is_active'=>1]);
        Reaction::create(['id'=>1003,'name_en'=>'أحزنني','name_ar'=>'sad','icon'=>'sad.png','is_active'=>1]);
        Reaction::create(['id'=>1004,'name_en'=>'أغضبني','name_ar'=>'angry','icon'=>'angry.png','is_active'=>1]);
    }
}
