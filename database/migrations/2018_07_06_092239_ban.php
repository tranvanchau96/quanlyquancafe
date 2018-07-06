<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ban', function (Blueprint $table) {
            $table->string('maban',20);
                $table->primary('maban');
            $table->string('makhuvuc',20);
                $table->foreign('makhuvuc')->references('makhuvuc')->on('khuvuc');
            $table->string('tenban',20);
            $table->string('trangthai',20);
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
        Schema::dropIfExists('ban');
    }
}
