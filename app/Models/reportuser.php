<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportuser extends Model
{
    //
    protected $table = "reportuser";

    public function user(){
    	return $this->belongsTo('App\reportuser', 'iduser', 'idreportuser');
    }
}
