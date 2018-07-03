<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    //
    protected $table = "topic";

    public function post(){
    	return $this->hasMany('App\Models\post', 'idtopic', 'idpost');
    }
}
