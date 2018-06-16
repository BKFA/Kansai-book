<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportsubcomment extends Model
{
    //
    protected $table = "reportsubcomment";

    public function subcomment(){
    	return $this->belongsTo('App\reportsubcomment', 'idsubcomment', 'idreportsubcomment');
    }
}
