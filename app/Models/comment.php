<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $table = "comment";\

    public function post(){
    	return $this->belongsTo('App\comment', 'idpost', 'idcomment');
    }

    public function user(){
    	return $this->belongsTo('App\comment', 'iduser', 'idcomment');
    }

    public function ratecomment(){
    	return $this->hasMany('App\ratecomment', 'idcomment', 'idratecomment');
    }

    public function reportcomment(){
    	return $this->hasMany('App\reportcomment', 'idcomment', 'idreportcomment');
    }

}
