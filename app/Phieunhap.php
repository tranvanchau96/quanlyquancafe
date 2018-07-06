<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phieunhap extends Model
{
    //
    protected $table = "phieunhap";
    protected $primaryKey ='id';

    public function nhacungcap(){
    	return $this->belongsTo('App\Nhacungcap','mancc','mancc');
    }

    public function chitietphieunhap(){
    	return $this->hasMany('App\Chitietphieunhap','id_phieunhap','id');
    }
}
