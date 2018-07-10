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

    // Create new topic
    public function postCreate(Request $request) {
        $this->validate($request,
            [
                'nametopic'=>'required|min:3|unique:topic,nametopic',
               
            ],
            [
                'nametopic.required'=>'You have not filled out NAMETOPIC yet',
                'nametopic.min'=>'NAMETOPIC must be at least 3 characters',
                'nametopic.unique'=>'NAMETOPIC Existed',
            ]
        );
        $createTopic = new topic;
        $createTopic->nametopic = $request->nametopic;
        $createTopic->ansinametopic = changeTitle($request->nametopic);
        $createTopic->save();

        return redirect('admin/topic/list')->with('notify','Create successful : '.$request->nametopic);
    }

    // Update topic
    public function postUpdate(Request $request, $idtopic) {
        $this->validate($request,
            [
                'nametopic'=>'min:3|unique:topic,nametopic',
               
            ],
            [
                'nametopic.min'=>'NAMETOPIC must be at least 3 characters',
                'nametopic.unique'=>'NAMETOPIC Existed',
            ]
        );
        $updateTopic = topic::find($idtopic);
        $updateTopic->nametopic = $request->nametopic;
        //convert nametopic to ansiname
        $updateTopic->ansinametopic = changeTitle($request->nametopic); 
        $updateTopic->save();
        return redirect('admin/topic/list')->with('notify','Update successful : '.$request->nametopic); 
    }

    // Delete topic
    public function getDelete($idtopic){
        $deleteTopic = topic::find($idtopic);
        //save nametopic before delete to show
        $nameTopic = $deleteTopic->nametopic;
        $deleteTopic->delete();
        return redirect('admin/topic/list')->with('notify','Delete successful : '.$nameTopic);
    }

}
