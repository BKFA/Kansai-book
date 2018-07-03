<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subcomment extends Model
{
    //
    protected $table = "subcomment";

    public function comment(){
    	return $this->belongsTo('App\Models\subcomment', 'idcomment', 'idsubcomment');
    }

    public function user(){
    	return $this->belongsTo('App\Models\subcomment', 'iduser', 'idsubcomment');
    }

    // public function ratesubcomment(){
    // 	return $this->hasMany('App\Models\ratesubcomment', 'idsubcomment', 'idratesubcomment');
    // }

    // public function reportsubcomment(){
    // 	return $this->hasMany('App\Models\reportsubcomment', 'idsubcomment', 'idreportsubcomment');
    // }

}
