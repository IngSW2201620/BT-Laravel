<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateroadStopsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('road_stops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_road')->unsigned();
            $table->integer('id_stop')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_road')->references('id')->on('roads');
            $table->foreign('id_stop')->references('id')->on('stops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('road_stops');
    }
}
