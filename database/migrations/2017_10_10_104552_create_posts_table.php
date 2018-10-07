
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->integer('update_by')->default(0);
            $table->string('type', 50);
            $table->string('name');
            $table->string('link');
            $table->mediumText('image')->nullable();
            $table->text('content')->nullable();
            $table->mediumText('description')->nullable();
            $table->tinyInteger('parent_id')->default(0);
            $table->tinyInteger('order_id')->default(1);
            $table->Integer('view_count')->default(0);
            $table->tinyInteger('comment_count')->default(0);
            $table->tinyInteger('is_share')->default(1);
            $table->tinyInteger('is_comment')->default(1);
            $table->tinyInteger('is_read')->default(0);
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();
//            $table->tinyInteger('is_password')->default(0);
//            $table->string('password',50)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onUpdate('cascade')->onDelete('cascade');
            $table->unique(['link']);
        });

        Schema::create('post_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->string('meta_type', 100);
            $table->mediumText('meta_key')->nullable();
            $table->mediumText('meta_value')->nullable();
            $table->string('meta_etc')->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_meta');
    }

}
