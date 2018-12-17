<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShareNetworkToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('posts', function($table) {
        $table->integer('post_id');
         $table->integer('social_network_id');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('posts', function($table) {
        $table->dropColumn('post_id');
        $table->dropColumn('social_network_id');
    });
    }
}
