<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class adve extends Model
{
    //
    protected $table = "advertisement"; 
    protected $primaryKey = 'idadve';

    protected $fillable = [
        'idadve', 'des', 'ansindes','urladve', 'urlimg',
    ];

    public function getAdve()
    {
    	return $this->get();
    }

}
