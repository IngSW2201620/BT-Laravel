<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateroadsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roads', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('id_source_stop')->unsigned();
            $table->integer('id_destination_stop')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_source_stop')->references('id')->on('stops');
            $table->foreign('id_destination_stop')->references('id')->on('stops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roads');
    }
}
