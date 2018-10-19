<?php

namespace Modules\Posts\Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::create(['id'=>1000,'name'=>str_random(8),'email'=>str_random(8).'@gmail.com',
            'display_name'=>str_random(8),'password'=>'$2y$10$HSV7SGAPiONdfIVQdcDRW.i0X3hNBfQrsLME/C4ciHXBUnyl44EvK',
            'is_active'=>1,'image'=>'20170721_184010 (2).jpg']);
        User::create(['id'=>1001,'name'=>str_random(8),'email'=>str_random(8).'@gmail.com',
            'display_name'=>str_random(8),'password'=>'$2y$10$HSV7SGAPiONdfIVQdcDRW.i0X3hNBfQrsLME/C4ciHXBUnyl44EvK',
            'is_active'=>1,'image'=>'Untitled.png']);
        User::create(['id'=>1002,'name'=>str_random(8),'email'=>str_random(8).'@gmail.com',
            'display_name'=>str_random(8),'password'=>'$2y$10$HSV7SGAPiONdfIVQdcDRW.i0X3hNBfQrsLME/C4ciHXBUnyl44EvK',
            'is_active'=>1,'image'=>'Untitled1.png']);
    }
}
