<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chitietdatmon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdatmon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_datmon')->unsigned();
            $table->foreign('id_datmon')->references('id')->on('datmon');
            $table->string('mahh',20);
                $table->foreign('mahh')->references('mahh')->on('hanghoa');
            $table->integer('soluong');
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
        //
        Schema::dropIfExists('chitietdatmon');
    }
}

