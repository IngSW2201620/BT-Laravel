<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreaterouteschedulesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routeschedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('destination');
            $table->string('source');
            $table->date('date');
            $table->string('status');
            $table->string('name');
            $table->date('startingDate');
            $table->date('endingDate');
            $table->integer('driver')->unsigned()->foreigh(driver, id);
            $table->foreign('ticket')->references('id')->on('Tickets');
            $table->foreign('usedTicket')->references('id')->on('Tickets');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('routeschedules');
    }
}
