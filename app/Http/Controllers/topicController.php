<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topic;

class topicController extends Controller
{
    //
    public function getList() {
        $Topic =topic::all();
        return view('admin.topic.list',['Topic'=>$Topic]);
    }

    public function getCreate() {
    	return view('admin.topic.create');
    }

    public function postCreate(Request $request) {
        $createTopic=new topic;
        $createTopic->nametopic=$request->createNameTopic;
        $createTopic->ansinametopic=$request->createAnsinameTopic;
        $createTopic->save();
        return redirect('admin/topic/list')->with('notify','Create successful : '.$request->createNameTopic);
    }

    public function postUpdate(Request $request, $idtopic) {
        $updateTopic = topic::find($idtopic);
        $updateTopic->nametopic=$request->updateNameTopic;
        $updateTopic->ansinametopic=$request->updateansiNameTopic;
        $updateTopic->save();
        return redirect('admin/topic/list')->with('notify','Update successful : '.$request->updateNameTopic); 
    }

    public function getDelete($idtopic){
        $deleteTopic= topic::find($idtopic);
        $nameTopic=$deleteTopic->nametopic;
        $deleteTopic->delete();
        return redirect('admin/topic/list')->with('notify','Delete successful : '.$nameTopic);
    }

}
