<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportcomment extends Model
{
    //
    protected $table = "reportcomment";

    public function comment(){
    	return $this->belongsTo('App\reportcomment', 'idcomment', 'idreportcomment');
    }
}
