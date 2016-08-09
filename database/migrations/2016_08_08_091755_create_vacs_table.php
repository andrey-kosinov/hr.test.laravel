<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vname');
            $table->string('vcomp');
            $table->string('vreqs');
            $table->integer('vsalary');
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
        Schema::drop('vacs');
    }
}
