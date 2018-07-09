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
               'userupload' => 'required',
               'title' => 'required|unique:post,title',
               'description' => 'required',
               'content' => 'required'
            ],
            [
               'topic.required' => 'You have not selected a Topic yet',
               'userupload.required' => 'You have not selected a User Upload yet',
               'title.required' => 'You have not filled out Title yet',
               'description.required' => 'You have not filled out Description yet',
               'content.required' => 'You have not filled out Content yet',
               'title.unique'=> 'The Title already exists'
            ]
        );

        $postCreate = new post;
        $postCreate->idtopic = $request->topic;
        $postCreate->iduser = $request->userupload;
        $postCreate->title = $request->title;
        $postCreate->ansititle = changeTitle($request->title);
        $postCreate->description = $request->description;
        $postCreate->contentpost = $request->content;

        if($request->hasFile('imgpost')){
            $img = $request->file('imgpost');
            $ext = $img->getClientOriginalExtension();
            if(!checkExtensionImage($ext)) {
                return redirect('admin/post/create')->with('error', 'DO NOT SUPPORT THIS FORMAT!');
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
        return redirect('admin/post/list')->with('notify','Create successfully');
    }

    public function getUpdate($idpost) {
    	$topic = topic::all();
    	$user = User::all();
    	$post = post::find($idpost);

    	return view('admin.post.update', ['post'=>$post, 'topic'=>$topic, 'user'=>$user]);
    }

    public function postUpdate(Request $request, $idpost) {
        $post = post::find($idpost);
        if($request->topic != null) $post->idtopic = $request->topic;
        if($request->user != null) $post->iduser = $request->userupload;
        if($request->title != null) $post->title = $request->title;
        $post->ansititle = changeTitle($request->title);
        if($request->description != null) $post->description = $request->description;
        if($request->content != null) $post->contentpost = $request->content;

        if($request->hasFile('imgpost')){
            $img = $request->file('imgpost');
            $ext = $img->getClientOriginalExtension();
            if(!checkExtensionImage($ext)) {
                return redirect('admin/update/post/$idpost')->with('error','DO NOT SUPPORT THIS FORMAT!');
            }
            $urlimage =  substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190); 
            while(file_exists('upload/images/imgpost/' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/imgpost', $urlimage);
            if($post->urlimage != 'default.jpg' && file_exists('upload/images/imgpost/' . $post->urlimage)) unlink('upload/images/imgpost/' . $post->urlimage);
            $post->urlimage = $urlimage;
        }
        $post->save();

        return redirect('admin/post/list')->with('notify','Update Successfully!');
    }

    public function getDelete($idpost){
        $post = post::find($idpost);
        $urlimage = $post->urlimage;
 
        if($urlimage != 'default.jpg' && file_exists('upload/images/imgpost/' . $urlimage)) unlink('upload/images/imgpost/' . $urlimage);
        $name = cutString($post->title, 40);
        $post->delete();
        return redirect('admin/post/list')->with('notify', 'Delete Successfully ' . $name);
    }
}
