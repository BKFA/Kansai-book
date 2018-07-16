<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topic;
use App\Models\post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class pagesController extends Controller
{
	function __construct() {
		$topPost = post::orderBy('view','DESC')->take(10)->get();
		view()->share('topPost',$topPost);
	}

    function getHome() {
    	$post = post::paginate(10);
    	return view('pages.home',['post'=>$post]);
    }

    function getPosts($idpost) {
    	$post = post::find($idpost);
    	return view('pages.detail',['post'=>$post]);
    }

    function getPostsUser($iduser) {
    	$user = User::find($iduser);
    	$post = post::where('iduser',$iduser)->get();
    	return view('pages.postsuser',['user'=>$user, 'post'=>$post]);
    }

    function getCreatePost() {
    	$topicPost = topic::all();
    	return view('pages.createpost', ['topicPost'=>$topicPost]);
    }

    function postCreatePost(Request $request) {

    	$this->validate(
            $request, 
            [
               'topic' => 'required',
               'title' => 'required|unique:post,title',
               'description' => 'required',
               'content' => 'required'
            ],
            [
               'topic.required' => 'You have not selected a Topic yet',
               'title.required' => 'You have not filled out Title yet',
               'description.required' => 'You have not filled out Description yet',
               'content.required' => 'You have not filled out Content yet',
               'title.unique'=> 'TITLE Existed'
            ]
        );

        $postCreate = new post;
        $postCreate->idtopic = $request->topic;
        $postCreate->iduser = Auth::user()->iduser;
        $postCreate->title = $request->title;
        $postCreate->ansititle = changeTitle($request->title);
        $postCreate->description = $request->description;
        $postCreate->contentpost = $request->content;

        if($request->hasFile('imgpost')){
            $img = $request->file('imgpost');
            $ext = $img->getClientOriginalExtension();
            if(!checkExtensionImage($ext)) {
                return redirect('/posts/create')->with('error', 'DO NOT SUPPORT THIS FORMAT!');
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
        return redirect('/')->with('notify','Create successfully ' . $request->title);
    }
}
