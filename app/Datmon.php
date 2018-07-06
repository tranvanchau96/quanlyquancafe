<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datmon extends Model
{
    //
    protected $table = "datmon";
    protected $primaryKey ='id';

    public function ban(){
    	return $this->belongsTo('App\Ban','maban','maban');
    }

    public function chitietdatmon(){
    	return $this->hasMany('App\Chitietdatmon','id_datmon','id');
    }
}
