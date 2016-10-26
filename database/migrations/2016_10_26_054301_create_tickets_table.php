<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('purchaseDate');
            $table->string('expirationDate');
            $table->string('usteDate');
            $table->string('dateReservation');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('routeUsed')->references('id')->on('routeschedules');
            $table->foreign('owner')->references('id')->on('passengers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
