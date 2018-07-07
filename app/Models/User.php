<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    protected $primaryKey = 'iduser';

    protected $fillable = [
        'username', 'email', 'password', 'name', 'age', 'job', 'idauth', 'point', 'education', 'address', 'japanlv', 'englv',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post(){
        return $this->hasMany('App\Models\topic','idusers','idpost');
    }
    
    public function comment(){
        return $this->hasMany('App\Models\comment','idusers','idcomment');
    }

    public function subcomment(){
        return $this->hasMany('App\Models\subcomment','iduser','idsubcomment');
    }
}
