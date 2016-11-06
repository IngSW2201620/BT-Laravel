<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatebusPositionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bus')->unsigned();
            $table->integer('latitude');
            $table->integer('longitude');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_bus')->references('id')->on('buses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bus_positions');
    }
}
