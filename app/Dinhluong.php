<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dinhluong extends Model
{
    //
    protected $table = "dinhluong";
    protected $primaryKey ='id';

    public function hanghoathanhpham(){
    	return $this->belongsTo('App\Hanghoa','mahh_tp','mahh');
    }

    public function hanghoa(){
    	return $this->belongsTo('App\Hanghoa','mahh','mahh');
    }
}
