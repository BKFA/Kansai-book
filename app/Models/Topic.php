<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $table = "topic";

    public function post(){
    	return $this->hasMany('App\Models\post','idtopic','idpost');
    }
}
