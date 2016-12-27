<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
//            $table->increments('id');
            $table->string('emp_code');
            $table->string('name');
            $table->string('current_designation');
            $table->string('grade');
            $table->string('location');
            $table->string('department');
            $table->string('sub_department');
            $table->string('cluster');
            $table->string('reporting_manager');
            $table->string('email');
            $table->string('contact_number');
            $table->date('DOJ');
            $table->string('privilege');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employee');
        //
    }
}
