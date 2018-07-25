<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Updatepost extends Model
{
    protected $table = "updatepost";

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'idupdatepost', 'idpost');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
