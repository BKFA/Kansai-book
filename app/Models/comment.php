<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $table = "comment";
    protected $primaryKey = 'idcomment';

    protected $fillable = [
        'idcomment', 'iduser', 'idpost', 'contentcomment', 'parent','like', 'dislike','status','created_at', 'updated_at',
    ];

    public function post(){
    	return $this->belongsTo('App\Models\comment', 'idpost', 'idcomment');
    }

    public function user(){
    	return $this->belongsTo('App\Models\comment', 'iduser', 'idcomment');
    }

}
