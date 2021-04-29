<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
           $table->id();
            $table->string('name');
            $table->string('name_fake');
            $table->string('author')->nullable();
            $table->float('price', 10, 2);//('nombre', total_digitos, total_decimales)
            $table->float('price_fake', 10, 2);
            $table->string('description');
            $table->string('description_fake');
            $table->string('photo');
            $table->string('photo_fake');
            $table->date('date_arrival');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->onUpdate('cascade');;
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
        Schema::dropIfExists('pictures');
    }
}
