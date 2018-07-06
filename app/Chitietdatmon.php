<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chitietdatmon extends Model
{
    //
    protected $table = "chitietdatmon";
    protected $primaryKey ='id';

    public function datmon(){
    	return $this->belongsTo('App\Datmon','id_datmon','id');
    }

    public function hanghoa(){
    	return $this->belongsTo('App\Hanghoa','mahh','mahh');
    }
}
