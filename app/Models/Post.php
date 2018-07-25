<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;

    protected $table = "post";

    public function topic(){
    	return $this->belongsTo('App\Models\Topic','topic_id',''); 
    }

    public function user(){
    	return $this->belongsTo('App\Models\User','user_id','');
    }

    public function updatepost(){
        return $this->hasMany('App\Models\Updatepost','idpost','idupdatepost');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment','idpost','idcomment');
    }

}
