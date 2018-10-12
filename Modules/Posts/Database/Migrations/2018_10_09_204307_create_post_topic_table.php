<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_topic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id',false,true);
            $table->integer('topic_id',false,true);
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('topic_id')->references('id')->on('topics')->onUpdate('cascade')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_topic');
    }
}
