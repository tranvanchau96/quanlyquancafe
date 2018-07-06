<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khuvuc extends Model
{
    //
    protected $table = "khuvuc";
    protected $primaryKey ='makhuvuc';

    public function ban(){
    	return $this->hasMany('App\Ban','makhuvuc','makhuvuc');
    }
}
