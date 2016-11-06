<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateroutesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_assigned_driver')->unsigned();
            $table->integer('id_assigned_bus')->unsigned();
            $table->integer('id_road')->unsigned();
            $table->date('schedule_time');
            $table->integer('id_route_status')->unsigned();
            $table->date('starDate');
            $table->date('endDate');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_assigned_driver')->references('id')->on('drivers');
            $table->foreign('id_assigned_bus')->references('id')->on('buses');
            $table->foreign('id_road')->references('id')->on('roads');
            $table->foreign('id_route_status')->references('id')->on('route_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('routes');
    }
}
