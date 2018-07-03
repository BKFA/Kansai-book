<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $table = "comment";

    public function post(){
    	return $this->belongsTo('App\Models\comment', 'idpost', 'idcomment');
    }

    public function user(){
    	return $this->belongsTo('App\Models\comment', 'iduser', 'idcomment');
    }

    // public function ratecomment(){
    // 	return $this->hasMany('App\Models\ratecomment', 'idcomment', 'idratecomment');
    // }

    // public function reportcomment(){
    // 	return $this->hasMany('App\Models\reportcomment', 'idcomment', 'idreportcomment');
    // }

}
