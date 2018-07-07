<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $table = "post";
    protected $primaryKey = 'idpost';

    protected $fillable = [
        'idpost', 'idtopic', 'iduser', 'title', 'ansititle', 'description', 'contentpost', 'urlimage', 'view', 'status', 'type', 'created_at', 'updated_at',
    ];

    public function topic(){
    	return $this->belongsTo('App\Models\post', 'idtopic', 'idpost');
    }

    public function user(){
    	return $this->belongsTo('App\Models\post', 'iduser', 'idpost');
    }

    public function ratepost(){
        return $this->hasMany('App\Models\updatepost', 'idpost', 'idupdatepost');
    }

    public function comment(){
        return $this->hasMany('App\Models\comment', 'idpost', 'idcomment');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Models\tag', 'post_tag', 'idpost', 'idtag')->withTimestamps();
    }

}
