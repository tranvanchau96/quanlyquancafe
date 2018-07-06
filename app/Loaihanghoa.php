<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaihanghoa extends Model
{
    //
    protected $table = "loaihanghoa";
    protected $primaryKey ='maloaihh';

    public function hanghoa(){
    	return $this->hasMany('App\Hanghoa','maloaihh','maloaihh');
    }
}
