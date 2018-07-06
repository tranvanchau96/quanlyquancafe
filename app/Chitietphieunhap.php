<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietphieunhap extends Model
{
    //
    protected $table = "chitietphieunhap";
    protected $primaryKey ='id';

    public function hanghoa(){
    	return $this->belongsTo('App\Hanghoa','mahh','mahh');
    }

    public function phieunhap(){
    	return $this->belongsTo('App\Phieunhap','id_phieunhap','id');
    }
}
