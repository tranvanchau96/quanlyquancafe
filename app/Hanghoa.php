<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hanghoa extends Model
{
    //
    protected $table = "hanghoa";
    protected $primaryKey ='mahh';

    public function loaihanghoa(){
    	return $this->belongsTo('App\Loaihanghoa','maloaihh','maloaihh');
    }

    public function nhomhanghoa(){
    	return $this->belongsTo('App\Nhomhanghoa','manhomhh','manhomhh');
    }

    public function chitietphieunhap(){
    	return $this->hasMany('App\Chitietphieunhap','mahh','mahh');
    }

    public function chitietdatmon(){
    	return $this->hasMany('App\Chitietdatmon','mahh','mahh');
    }

    public function chitietkho(){
    	return $this->hasMany('App\Chitietkho','mahh','mahh');
    }

    public function dinhluong(){
    	return $this->hasMany('App\Dinhluong','mahh','mahh');
    }
    public function dinhluongthanhtpham(){
    	return $this->hasMany('App\Dinhluong','mahh_tp','mahh');
    }
}
