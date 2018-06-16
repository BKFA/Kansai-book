<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $table = "post";

    public function topic(){
    	return $this->belongsTo('App\post', 'idtopic', 'idpost');
    }

    public function user(){
    	return $this->belongsTo('App\post', 'iduser', 'idpost');
    }

    public function ratepost(){
    	return $this->hasMany('App\ratepost', 'idpost', 'idratepost');
    }

    public function reportpost(){
    	return $this->hasMany('App\reportpost', 'idpost', 'idreportpost');
    }

    public function comment(){
    	return $this->hasMany('App\comment', 'idpost', 'idcomment');
    }
}
