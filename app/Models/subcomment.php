<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcomment extends Model
{
    //
    protected $table = "subcomment";

    public function comment(){
    	return $this->belongsTo('App\subcomment', 'idcomment', 'idsubcomment');
    }

    public function user(){
    	return $this->belongsTo('App\subcomment', 'iduser', 'idsubcomment');
    }

    public function ratesubcomment(){
    	return $this->hasMany('App\ratesubcomment', 'idsubcomment', 'idratesubcomment');
    }

    public function reportsubcomment(){
    	return $this->hasMany('App\reportsubcomment', 'idsubcomment', 'idreportsubcomment');
    }

}
