<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    //
    protected $table = "ban";
    protected $primaryKey ='maban';

    public function khuvuc(){
    	return $this->belongsTo('App\Khuvuc','makhuvuc','makhuvuc');
    }

    public function datmon(){
    	return $this->hasMany('App\Datmon','maban','maban');
    }



}
