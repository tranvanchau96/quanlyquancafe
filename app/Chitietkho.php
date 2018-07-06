<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietkho extends Model
{
    //
    protected $table = "chitietkho";
    protected $primaryKey ='id';

    public function hanghoa(){
    	return $this->belongsTo('App\Hanghoa','mahh','mahh');
    }

    public function kho(){
    	return $this->belongsTo('App\Kho','makho','makho');
    }
}
