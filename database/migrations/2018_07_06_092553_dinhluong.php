<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dinhluong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinhluong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahh_tp',20);
                $table->foreign('mahh_tp')->references('mahh')->on('hanghoa');
            $table->string('mahh',20);
                $table->foreign('mahh')->references('mahh')->on('hanghoa');
            $table->integer('khoiluong');
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
        Schema::dropIfExists('dinhluong');
    }
}
