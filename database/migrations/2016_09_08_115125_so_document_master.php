<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SoDocumentMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_document_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('so_type');
            $table->string('document_type');
            $table->string('required');
            $table->string('deleted');
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
        Schema::drop('so_document_master');
        //
    }
}
