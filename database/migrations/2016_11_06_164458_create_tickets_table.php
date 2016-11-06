<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateticketsTable extends Migration
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
            $table->integer('id_owner')->unsigned();
            $table->integer('id_reserved_route')->unsigned();
            $table->integer('id_used_route')->unsigned();
            $table->integer('id_used_stop')->unsigned();
            $table->date('used_date');
            $table->date('expiration_date');
            $table->integer('id_seller')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_owner')->references('id')->on('users');
            $table->foreign('id_reserved_route')->references('id')->on('routes');
            $table->foreign('id_used_route')->references('id')->on('routes');
            $table->foreign('id_used_stop')->references('id')->on('stops');
            $table->foreign('id_seller')->references('id')->on('sellers');
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
