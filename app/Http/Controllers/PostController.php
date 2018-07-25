<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function getList() {
    	$topic = Topic::all();
    	$post = Post::orderBy('id','DESC')->get();

    	return view('admin.post.list', ['post'=>$post]);
    }

    public function getCreate() {
    	$topic = Topic::all();
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
               'title.unique'=> 'TITLE Existed'
            ]
        );

        $postCreate = new Post;
        $postCreate->topic_id = $request->topic;
        $postCreate->user_id = $request->userupload;
        $postCreate->title = $request->title;
        $postCreate->ansititle = changeTitle($request->title);
        $postCreate->description = $request->description;
        $postCreate->content = $request->content;

        if($request->hasFile('imgpost')){
            $img = $request->file('imgpost');
            $ext = $img->getClientOriginalExtension();
            if(!checkExtensionImage($ext)) {
                return redirect('admin/post/create')->with('error','DO NOT SUPPORT THIS FORMAT!');
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
        return redirect('admin/post/list')->with('notify','Create successfully ' . $request->title);
    }

    public function getUpdate($id) {
    	$topic = Topic::all();
    	$user = User::all();
    	$post = Post::find($id);

    	return view('admin.post.update', ['post'=>$post, 'topic'=>$topic, 'user'=>$user]);
    }

    public function postUpdate(Request $request, $id) {
        $post = Post::find($id);
        if($request->topic != null) $post->topic_id = $request->topic;
        if($request->userupload != null) $post->user_id = $request->userupload;
        if($request->title != null) $post->title = $request->title;
        $post->ansititle = changeTitle($request->title);
        if($request->description != null) $post->description = $request->description;
        if($request->content != null) $post->content = $request->content;

        if($request->hasFile('imgpost')){
            $img = $request->file('imgpost');
            $ext = $img->getClientOriginalExtension();
            if(!checkExtensionImage($ext)) {
                return redirect("admin/post/update/$id")->with('error','DO NOT SUPPORT THIS FORMAT!');
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

        return redirect('admin/post/list')->with('notify','Update Successfully ' . $request->title);
    }

    public function getDelete($id){
        $post = post::find($id);
        $urlimage = $post->urlimage;
 
        if($urlimage != 'default.jpg' && file_exists('upload/images/imgpost/' . $urlimage)) unlink('upload/images/imgpost/' . $urlimage);
        $name = cutString($post->title, 40);
        $post->delete();
        return redirect('admin/post/list')->with('notify', 'Delete Successfully ' . $name);
    }
}
