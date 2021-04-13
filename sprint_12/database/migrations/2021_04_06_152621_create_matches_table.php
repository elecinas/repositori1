<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->dateTime('programacion_partido', 0);
            $table->unsignedBigInteger('stadium_id');
            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('team_1');
            $table->foreign('team_1')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('team_2');
            $table->foreign('team_2')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('matches');
    }

}
