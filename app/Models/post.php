<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $table = "post";

    public function topic(){
    	return $this->belongsTo('App\Models\post', 'idtopic', 'idpost');
    }

    public function user(){
    	return $this->belongsTo('App\Models\post', 'iduser', 'idpost');
    }

    public function ratepost(){
        return $this->hasMany('App\Models\updatepost', 'idpost', 'idupdatepost');
    }

    public function comment(){
        return $this->hasMany('App\Models\comment', 'idpost', 'idcomment');
    }

    // public function ratepost(){
    // 	return $this->hasMany('App\Models\ratepost', 'idpost', 'idratepost');
    // }

    // public function reportpost(){
    // 	return $this->hasMany('App\Models\reportpost', 'idpost', 'idreportpost');
    // }

}
