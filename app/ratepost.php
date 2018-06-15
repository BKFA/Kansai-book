<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ratepost extends Model
{
    //
    protected $table = "ratepost";

    public function post(){
    	return $this->belongsTo('App\ratepost', 'idpost', 'idratepost');
    }
}
