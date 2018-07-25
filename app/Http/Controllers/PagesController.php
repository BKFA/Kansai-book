<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\User;
use App\Models\Updatepost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;

class PagesController extends Controller
{
	function __construct() {
		$topPost = post::orderBy('view','DESC')->take(10)->get();
		view()->share('topPost',$topPost);
	}

    function getHome() {
    	$post = Post::paginate(10);
    	return view('pages.home',['post'=>$post]);
    }

    function getPosts($id) {
    	$post = Post::find($id);
        $postupdate = Updatepost::where('id', $id)->get();
    	return view('pages.detail',['post'=>$post, 'postupdate'=>$postupdate]);
    }

    function getPostsUser($id) {
    	$user = User::find($id);
    	$post = Post::where('id',$id)->get();
    	return view('pages.postsuser',['user'=>$user, 'post'=>$post]);
    }

    function getCreatePost() {
    	$topicPost = Topic::all();
    	return view('pages.createpost', ['topicPost'=>$topicPost]);
    }

    function postCreatePost(Request $request) {

    	$this->validate(
            $request, 
            [
               'topic' => 'required',
               'title' => 'required|unique:Post,title',
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

        $postCreate = new Post;
        $postCreate->topic_id = $request->topic;
        $postCreate->user_id = Auth::user()->id;
        $postCreate->title = $request->title;
        $postCreate->ansititle = changeTitle($request->title);
        $postCreate->description = $request->description;
        $postCreate->content = $request->content;

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

    function getUpdatePost($id) {
        $post = Post::find($id);
        $topicPost = Topic::all();
        return view('pages.updatecreatepost', ['post'=>$post], ['topicPost'=>$topicPost]);
    }

    function postUpdatePost(Request $request, $id) {

        $post = Post::find($id);
        //-----------------------------------------
        if($post->user_id == Auth::user()->id) {

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

            return redirect('/')->with('notify','Update Successfully ' . $request->title);
        }//endif
        //-----------------------------------------
        else {
                $this->validate(
                $request, 
                [
                   'topic' => 'required',
                   'title' => 'required|unique:Post,title',
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
                $postCreate = new Updatepost;
                $postCreate->topic_id = $request->topic;
                $postCreate->user_id = Auth::user()->id;
                $postCreate->id = $id;
                $postCreate->title = $request->title;
                $postCreate->ansititle = changeTitle($request->title);
                $postCreate->description = $request->description;
                $postCreate->content = $request->content;

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
                return redirect("posts/$post->id/$post->ansititle.html")->with('notify','send update successfully ' . $request->title);
        }//end else
        //-----------------------------------------
        
    }


     public function getDelete($id){
        $post = Post::find($id);
        if(!isset($post)||$post->user_id != Auth::user()->id) {
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
