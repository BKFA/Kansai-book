<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportpost extends Model
{
    //
    protected $table = "reportpost";

    public function post(){
    	return $this->belongsTo('App\reportpost', 'idpost', 'idreportpost');
    }
}
