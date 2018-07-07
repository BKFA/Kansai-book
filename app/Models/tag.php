<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //
    protected $table = "tag";
    protected $primaryKey = 'idtag';

  	protected $fillable = [
  		'tag', 'ansitag', 
  	];

  	public $timestamps = true;

    public function post()
    {
        return $this->belongsToMany('App\Models\post', )->withTimestamps();
    }
}
