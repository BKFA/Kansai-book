<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    //
    protected $table = "topic";

    public function post(){
    	return $this->hasMany('App\post', 'idtopic', 'idpost');
    }
}
