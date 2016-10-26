<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatepassengersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('balance');
            $table->integer('user')->unsigned();
            $table->integer('ticket')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('ticket')->references('id')->on('tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('passengers');
    }
}
