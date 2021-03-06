<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id',false,true);
            $table->text('text')->nullable();
            $table->enum('type', ['text', 'picture', 'video'])->default('text');
            $table->enum('dir', ['rtl', 'ltr'])->default('ltr');
            $table->Integer('view_count')->default(0);
            $table->tinyInteger('is_pined')->default(0);
            $table->tinyInteger('privacy')->default(0);
            $table->tinyInteger('time')->default(0);
            $table->tinyInteger('is_boost')->default(0);
            $table->string('check_in',100)->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
