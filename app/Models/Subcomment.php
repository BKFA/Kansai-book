<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcomment extends Model
{
    //
    protected $table = "subcomment";

    public function comment(){
    	return $this->belongsTo('App\Models\Subcomment', 'idcomment', 'idsubcomment');
    }

    public function user(){
    	return $this->belongsTo('App\Models\Subcomment', 'iduser', 'idsubcomment');
    }

    // public function ratesubcomment(){
    // 	return $this->hasMany('App\Models\ratesubcomment', 'idsubcomment', 'idratesubcomment');
    // }

    // public function reportsubcomment(){
    // 	return $this->hasMany('App\Models\reportsubcomment', 'idsubcomment', 'idreportsubcomment');
    // }

}
