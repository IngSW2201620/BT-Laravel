<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatestopsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('name');
            $table->integer('latitude');
            $table->integer('longitude');
            $table->string('status');
            $table->integer('road')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('road')->references('id')->on('roads');
            $table->foreign('ticket')->references('id')->on('Tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stops');
    }
}
