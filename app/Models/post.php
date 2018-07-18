<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use Searchable;

    protected $table = "post";
    protected $primaryKey = "idpost";

    public function topic(){
    	return $this->belongsTo('App\Models\topic','idtopic',''); 
    }

    public function user(){
    	return $this->belongsTo('App\Models\User','iduser','');
    }

    public function updatepost(){
        return $this->hasMany('App\Models\updatepost','idpost','idupdatepost');
    }

    public function comment(){
        return $this->hasMany('App\Models\comment','idpost','idcomment');
    }

}
