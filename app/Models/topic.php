<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    //
    protected $table = "topic";
    protected $primaryKey = 'idtopic';

    protected $fillable = [
        'idtopic', 'nametopic', 'ansinametopic',
    ];

    public function post(){
    	return $this->hasMany('App\Models\post', 'idtopic', 'idpost');
    }

    public function getTopic()
    {
    	return $this->get();
    }

    public function createTopic($input)
    {
        $this->create([
            'nametopic'     => $input->get('nameTopic'),
            'ansinametopic'    => changeTitle($input->get('nameTopic')),
        ]);
        return true;
    }

    public function updateTopic($input, $idtopic)
    {
    	$this->where('idtopic', $idtopic)->update([
            "nametopic" => $input->get("updateTopic"),
            "ansinametopic" => changeTitle($input->get('updateTopic')),
        ]);
        return true;
    }

    public function deleteTopic($idtopic)
    {
    	return $this->find($idtopic)->delete();
    }

}
