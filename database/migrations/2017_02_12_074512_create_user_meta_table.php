<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('meta_type');
            $table->string('meta_key')->nullable();
            $table->string('meta_value')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->string('display_name')->after('name');
            $table->string('phone',50)->nullable()->after('email'); //unique
            $table->string('site_register',100)->default('site')->after('phone');
            $table->mediumText('image')->nullable()->after('password');
            $table->string('address',200)->nullable()->after('password');
            $table->string('country',200)->nullable()->after('address');
            $table->string('nationality',50)->nullable()->after('country');
            $table->string('gender',50)->nullable()->after('nationality');
            $table->string('social_status',50)->nullable()->after('gender');
            $table->date('birthdate')->nullable()->after('social_status');
            $table->string('address_jop',100)->nullable()->after('birthdate');
            $table->string('occupation',200)->nullable()->after('address_jop');
            $table->text('about_me')->nullable()->after('occupation');
            $table->string('fcm_token')->nullable()->after('password');
            $table->tinyInteger('state_fcm_token')->default(1)->after('password');
            $table->tinyInteger('is_active')->default(0);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_meta');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('display_name');
            $table->dropColumn('phone');
            $table->dropColumn('image');
            $table->dropColumn('address');
            $table->dropColumn('is_active');
        });
    }
}
