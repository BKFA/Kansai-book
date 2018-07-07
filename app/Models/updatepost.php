<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class updatepost extends Model
{

	protected $table = "updatepost";
	protected $primaryKey = 'idupdatepost';

    protected $fillable = [
        'idupdatepost', 'idpost', 'iduser', 'title', 'ansititle', 'description', 'contentupdatepost', 'urlimage', 'view', 'status', 'type', 'created_at', 'updated_at',
    ];

    public function post(){
    	return $this->belongsTo('App\Models\post', 'idupdatepost', 'idpost');
    }
}
