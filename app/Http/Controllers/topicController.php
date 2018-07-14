<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use \App\Models\topic;

class topicController extends Controller
{
    //
    protected $topic;

    public function __construct(topic $topic){
        $this->topic = $topic;
    }
    
    public function getListTopic() {
        $topics = $this->topic->getTopic();
    	return view('admin.topic.list', compact('topics'));
    }

    // public function getCreate() {
    // 	return view('admin.topic.create');
    // }

    public function postAdd(Request $request) {
        $this->validate(
            $request, 
            [
                'nameTopic' => 'required|min:3|max:100|unique:topic,nametopic'
            ],
            [
                'nameTopic.required' => 'Bạn chưa nhập topic',
                'nameTopic.min' => 'Topic phải có độ dài từ 3 đến 100 ký tự',
                'nameTopic.max' => 'Topic phải có độ dài từ 3 đến 100 ký tự',
                'nameTopic.unique' => 'Topic đã tồn tại',
            ]
        );

        $this->topic->createTopic($request);

        return redirect('admin/topic/list')->with('thongbao','Thêm thành công '.$request->nameTopic);
    }

    public function postUpdate(Request $request, $idtopic) {
        $this->validate(
            $request, 
            [
                'updateTopic' => 'required|min:3|max:100|unique:topic,nametopic'
            ],
            [
                'updateTopic.required' => 'Bạn chưa nhập topic',
                'updateTopic.min' => 'Topic phải có độ dài từ 3 đến 100 ký tự',
                'updateTopic.max' => 'Topic phải có độ dài từ 3 đến 100 ký tự',
                'updateTopic.unique' => 'Topic đã tồn tại',
            ]
         );

        $this->topic->updateTopic($request, $idtopic);

        return redirect('admin/topic/list')->with('thongbao','Sửa thành công '.$request->updateTopic);
    }

    public function getDelete($idtopic)
    {
        $this->topic->deleteTopic($idtopic);
        return redirect('admin/topic/list')->with('thongbao','Bạn đã xóa thành công'); 
    }

}
