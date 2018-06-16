<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ratecomment extends Model
{
    //
    protected $table = "ratecomment";

    public function comment(){
    	return $this->belongsTo('App\ratecomment', 'idcomment', 'idratecomment');
    }
}
