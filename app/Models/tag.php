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
      return $this->belongsToMany('App\Models\post', 'post_tag', 'idpost', 'idtag');
    }

    public function getTag(){
      return $this->get();
    }

     public function createTag($input)
    {
        $this->create([
            'tag'     => $input->get('nameTag'),
            'ansitag'    => changeTitle($input->get('nameTag')),
        ]);
        return true;
    }

    public function updateTag($input, $idtag)
    {
      $this->where('idtag', $idtag)->update([
            "tag" => $input->get("updateTag"),
            "ansitag" => changeTitle($input->get('updateTag')),
        ]);
        return true;
    }

    public function deleteTag($idtag)
    {
      return $this->find($idtag)->delete();
    }

}
