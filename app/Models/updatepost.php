<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class updatepost extends Model
{
    public function post(){
    	return $this->belongsTo('App\Models\post', 'idupdatepost', 'idpost');
    }
}
