<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chitietkho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietkho', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahh',20);
            $table->foreign('mahh')->references('mahh')->on('hanghoa');
            $table->string('makho',20);
            $table->foreign('makho')->references('makho')->on('kho');
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
        Schema::dropIfExists('chitietkho');
    }
}
