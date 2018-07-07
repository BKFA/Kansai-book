<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class advertisement extends Model
{
    //
    protected $table = "advertisement"; 
    protected $primaryKey = 'idadvertisement';

    protected $fillable = [
        'idadvertisement', 'urladvertisement',
    ];

}
