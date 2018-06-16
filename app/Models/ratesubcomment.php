<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ratesubcomment extends Model
{
    //
    protected $table = "ratesubcomment";

    public function subcomment(){
    	return $this->belongsTo('App\ratesubcomment', 'idsubcomment', 'idratesubcomment');
    }
}
