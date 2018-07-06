<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hanghoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hanghoa', function (Blueprint $table) {
            $table->string('mahh',20);
                $table->primary('mahh');
            $table->string('manhomhh',20);
                $table->foreign('manhomhh')->references('manhomhh')->on('nhomhanghoa');
            $table->string('maloaihh',20);
                $table->foreign('maloaihh')->references('maloaihh')->on('loaihanghoa');
            $table->string('tenhh',40);
            $table->string('donvitinh',20);
            $table->integer('dongia');
            $table->string('dinhluong',30);
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
        Schema::dropIfExists('hanghoa');
    }
}

