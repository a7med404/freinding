<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactionReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reaction_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id',false,true);
            $table->integer('reaction_id',false,true);
            $table->integer('reply_id',false,true);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('reaction_id')->references('id')->on('reactions')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('reply_id')->references('id')->on('replies')->onUpdate('cascade')->onDelete('restrict');
            $table->softDeletes('deleted_at');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reaction_reply');
    }
}
