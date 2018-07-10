<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class follow extends Model
{
    protected $table = "follow";
    protected $primaryKey = 'idfollow';

    protected $fillable = [
        'idfollow', 'iduser', 'iduserfollowed',
    ];
}
