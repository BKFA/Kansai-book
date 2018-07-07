<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topic;

class topicController extends Controller
{
    // Display list topic
    public function getList() {
        $topic =topic::all();
        return view('admin.topic.list',['topic'=>$topic]);
    }

    // Call to view new create topic
    public function getCreate() {
    	return view('admin.topic.create');
    }

    // new create topic
    public function postCreate(Request $request) {
        $this->validate($request,
            [
                'nameTopic'=>'|unique:topic,nametopic',
               
            ],
            [
                'nameTopic.unique'=>'NAMETOPIC EXISTED',
            ]
        );
        $createTopic=new topic;
        $createTopic->nametopic=$request->NameTopic;
        $createTopic->ansinametopic=changeTitle($request->NameTopic);
        $createTopic->save();
        return redirect('admin/topic/list')->with('notify','Create successful : '.$request->NameTopic);
    }

    // Update a topic
    public function postUpdate(Request $request, $idtopic) {
        $this->validate($request,
            [
                'nameTopic'=>'|unique:topic,nametopic',
               
            ],
            [
                'nameTopic.unique'=>'NAMETOPIC EXISTED',
            ]
        );
        $updateTopic = topic::find($idtopic);
        $updateTopic->nametopic=$request->NameTopic;
        $updateTopic->ansinametopic=changeTitle($request->NameTopic); //convert unsigned name, changeTitle function have been defined in app\Function\string.php
        $updateTopic->save();
        return redirect('admin/topic/list')->with('notify','Update successful : '.$request->NameTopic); 
    }

    // Delete a topic
    public function getDelete($idtopic){
        $deleteTopic= topic::find($idtopic);
        $nameTopic=$deleteTopic->nametopic; // Get the topic delete
        $deleteTopic->delete();
        return redirect('admin/topic/list')->with('notify','Delete successful : '.$nameTopic);
    }

}
