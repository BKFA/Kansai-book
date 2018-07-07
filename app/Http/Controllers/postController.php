<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topic;
use App\Models\post;
use App\Models\User;

class postController extends Controller
{
    public function getList() {
    	$topic = topic::all();
    	$post = post::orderBy('idpost','DESC')->get();
    	return view('admin.post.list', ['post'=>$post]);
    }

    public function getCreate() {
    	$topic = topic::all();
    	$user = User::all();
    	return view('admin.post.create', ['topic'=>$topic], ['user'=>$user]);
    }

    public function postCreate(Request $request) {
    	$this->validate(
            $request, 
            [
               'topic' => 'required',
               // 'userupload' => 'required',
               'title' => 'required|unique:post,title',
               'description' => 'required',
               'content' => 'required'
            ],
            [
               'topic.required' => 'You have not selected a Topic yet',
               // 'userupload.required' => 'You have not selected a User Upload yet',
               'title.required' => 'You have not filled out Title yet',
               'description.required' => 'You have not filled out Description yet',
               'content.required' => 'You have not filled out Content yet',
               'title.unique'=> 'The Title already exists'
            ]
        );

        $postCreate = new post;
        $postCreate->idtopic = $request->topic;
        $postCreate->iduser = 1;
        $postCreate->title = $request->title;
        $postCreate->ansititle = 'ABC';
        $postCreate->description = $request->description;
        $postCreate->contentpost = $request->content;

        if($request->hasFile('imgpost')){
            $img = $request->file('imgpost');
            $ext = $img->getClientOriginalExtension();
            if(!checkExtensionImage($ext)) {
                return redirect('admin/post/create')->with('error', 'Không hỗ trợ định dạng ảnh này!');
            }
            $urlimage =  substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while(file_exists('upload/images/imgpost/' . $urlimage)) {
                $urlimage =  substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/imgpost', $urlimage);
            $postCreate->urlimage = $urlimage;
        }else{
            $postCreate->urlimage = 'default.jpg';
        }
        $postCreate->view = 0;
        $postCreate->status = 0;

        $postCreate->save();
        return redirect('admin/post/create')->with('notify','Create successfully');
    }

    public function getUpdate() {
    	return view('admin.post.update');
    }

    public function postUpdate() {
        
    }
}
