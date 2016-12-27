<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document_name');
            $table->string('document_type');
            $table->string('document_stage');
            $table->string('required');
            $table->string('deleted');
            $table->string('stage');
            $table->string('for_each_dc');
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('document_master');
        //
    }
}
