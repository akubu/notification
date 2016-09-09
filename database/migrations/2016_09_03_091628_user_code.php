<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_code', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_type');
            $table->string('uid');
            $table->string('username');
            $table->string('email');
            $table->string('phone_number');
            $table->string('cluster');
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
        Schema::drop('user_code');
        //
    }
}
