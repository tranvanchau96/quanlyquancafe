<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Datmon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datmon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maban',20);
            $table->foreign('maban')->references('maban')->on('ban');
            $table->date('thoigian');
            $table->integer('tongtien');
            $table->string('trangthai',50);
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
        Schema::dropIfExists('datmon');
    }
}