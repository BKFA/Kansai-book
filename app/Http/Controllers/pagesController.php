<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topic;
use App\Models\post;
use App\User;
use App\Models\updatepost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;

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
        $postupdate = updatepost::where('idpost', $idpost)->get();
    	return view('pages.detail',['post'=>$post, 'postupdate'=>$postupdate]);
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

    function getUpdatePost($idpost) {
        $post = post::find($idpost);
        $topicPost = topic::all();
        return view('pages.updatecreatepost', ['post'=>$post], ['topicPost'=>$topicPost]);
    }

    function postUpdatePost(Request $request, $idpost) {

        $post = post::find($idpost);
        //-----------------------------------------
        if($post->iduser == Auth::user()->iduser) {

            if($request->topic != null) $post->idtopic = $request->topic;
            if($request->userupload != null) $post->iduser = $request->userupload;
            if($request->title != null) $post->title = $request->title;
            $post->ansititle = changeTitle($request->title);
            if($request->description != null) $post->description = $request->description;
            if($request->content != null) $post->contentpost = $request->content;

            if($request->hasFile('imgpost')){
                $img = $request->file('imgpost');
                $ext = $img->getClientOriginalExtension();
                if(!checkExtensionImage($ext)) {
                    return redirect("admin/post/update/$idpost")->with('error','DO NOT SUPPORT THIS FORMAT!');
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

            return redirect('/')->with('notify','Update Successfully ' . $request->title);
        }//endif
        //-----------------------------------------
        else {
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
                $postCreate = new updatepost;
                $postCreate->idtopic = $request->topic;
                $postCreate->iduser = Auth::user()->iduser;
                $postCreate->idpost = $idpost;
                $postCreate->title = $request->title;
                $postCreate->ansititle = changeTitle($request->title);
                $postCreate->description = $request->description;
                $postCreate->contentupdatepost = $request->content;

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
                Mail::send('admin\mailthongbao', array("name"=>"BKFA"), function($message) use ($post){
                    $message->to($post->User->email, 'Visitor')->subject('Feedback!');
                    $message->from('bkfa.com@gmail.com','Admin Kansai Book');
                });
                Mail::send('admin\mailautosend', array("name"=>"BKFA"), function($message){
                    $message->to(Auth::user()->email, 'Visitor')->subject('Feedback!');
                    $message->from('bkfa.com@gmail.com','Admin Kansai Book');
                });
                return redirect("posts/$post->idpost/$post->ansititle.html")->with('notify','send update successfully ' . $request->title);
        }//end else
        //-----------------------------------------
        
    }


     public function getDelete($idpost){
        $post = post::find($idpost);
        if(!isset($post)||$post->iduser != Auth::user()->iduser) {
            return redirect('/')->with('notify', 'you is not a creator it');
        }
        $urlimage = $post->urlimage;
        if($urlimage != 'default.jpg' && file_exists('upload/images/imgpost/' . $urlimage)) unlink('upload/images/imgpost/' . $urlimage);
        $name = cutString($post->title, 40);
        $post->delete();
        return redirect('/')->with('notify', 'Delete Successfully ' . $name);
    }

    //-----------------------------------------------
    //search
    public function searchIndex($content) {
        $searchPost = post::search($content)->get();
        return response()->json(
            [
                $searchPost,
            ]
        );
    }
}
