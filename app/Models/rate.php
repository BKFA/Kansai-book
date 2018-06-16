<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    //
    protected $table = "rate";

    public function user(){
    	return $this->belongsTo('App\rate', 'iduser', 'idrate');
    }
}
