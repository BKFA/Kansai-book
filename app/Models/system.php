<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class system extends Model
{
    //
    protected $table = "system";
    protected $primaryKey = 'idsystem';

    protected $fillable = [
        'idsystem', 'urllogo', 'urlslide',
    ];
}
