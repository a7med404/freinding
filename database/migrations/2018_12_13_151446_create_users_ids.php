<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersIds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_ids', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
			$table->string('id_image',100)->nullable();
            $table->enum('status', ['verified', 'unverified','underprocess']);	
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_ids');
    }
}
