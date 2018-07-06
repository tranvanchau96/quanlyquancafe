<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    //
    protected $table = "kho";
    protected $primaryKey ='makho';

    public function chitietkho(){
    	return $this->hasMany('App\Chitietkho','makho','makho');
    }
}
