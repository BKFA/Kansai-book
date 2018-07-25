<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    // Display list topic
    public function getList()
    {
        $topic = Topic::all();

        return view('admin.topic.list', ['topic' => $topic]);
    }

    // Call to view new create topic
    public function getCreate()
    {

        return view('admin.topic.create');
    }

    // Create new topic
    public function postCreate(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|unique:topic,name',

            ],
            [
                'name.required' => 'You have not filled out NAMETOPIC yet',
                'name.min' => 'NAMETOPIC must be at least 3 characters',
                'name.unique' => 'NAMETOPIC Existed',
            ]
        );
        $createTopic = new Topic;
        $createTopic->name = $request->name;
        $createTopic->ansiname = changeTitle($request->name);
        $createTopic->save();

        return redirect('admin/topic/list')->with('notify', 'Create successful : ' . $request->name);
    }

    // Update topic
    public function postUpdate(Request $request, $idtopic)
    {
        $this->validate($request,
            [
                'name' => 'min:3|unique:topic,name',

            ],
            [
                'name.min' => 'NAMETOPIC must be at least 3 characters',
                'name.unique' => 'NAMETOPIC Existed',
            ]
        );
        $updateTopic = Topic::find($idtopic);
        $updateTopic->name = $request->name;
        //convert name to ansiname
        $updateTopic->ansiname = changeTitle($request->name);
        $updateTopic->save();

        return redirect('admin/topic/list')->with('notify', 'Update successful : ' . $request->name);
    }

    // Delete topic
    public function getDelete($idtopic)
    {
        $deleteTopic = Topic::find($idtopic);
        //save name before delete to show
        $nameTopic = $deleteTopic->name;
        $deleteTopic->delete();

        return redirect('admin/topic/list')->with('notify', 'Delete successful : ' . $nameTopic);
    }

}
