<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    //
    protected $table = "nhacungcap";
    protected $primaryKey ='mancc';

    public function phieunhap(){
    	return $this->hasMany('App\Phieunhap','mancc','mancc');
    }
}
