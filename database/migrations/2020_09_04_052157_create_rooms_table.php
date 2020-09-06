<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('room_number')->unique();
            $table->integer('roomtype_id')->unsigned();
            // $table->foreign('roomtype_id')->references('id')->on('room_types')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            $table->string('ac_non_ac')->nullable();
            $table->string('bed');
            $table->string('food');
            $table->string('rent');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('rooms');
    }
}
