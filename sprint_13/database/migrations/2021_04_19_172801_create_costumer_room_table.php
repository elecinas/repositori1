<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostumerRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumer_room', function (Blueprint $table) {
            $table->id();
            $table->date('dia_reserva');
            $table->unsignedBigInteger('costumer_id')->unique();
            $table->unsignedBigInteger('room_id')->unique();
            
            $table->foreign('costumer_id')->references('id')->on('costumers');
            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('costumer_room');
    }
}
