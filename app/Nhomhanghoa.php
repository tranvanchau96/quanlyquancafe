<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhomhanghoa extends Model
{
    //
    protected $table = "nhomhanghoa";
    protected $primaryKey ='manhomhh';

	public function hanghoa(){
    	return $this->hasMany('App\Hanghoa','manhomhh','manhomhh');
    }
}
