<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subcomment extends Model
{
    //
    protected $table = "subcomment";
    protected $primaryKey = 'idsubcomment';

    protected $fillable = [
        'idsubcomment', 'iduser', 'idcomment', 'contentsubcomment', 'like', 'dislike', 'status', 'created_at', 'updated_at',
    ];

    public function comment(){
    	return $this->belongsTo('App\Models\subcomment', 'idcomment', 'idsubcomment');
    }

    public function user(){
    	return $this->belongsTo('App\Models\subcomment', 'iduser', 'idsubcomment');
    }

}
