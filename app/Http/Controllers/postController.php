<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;

use Illuminate\Http\Request;

use DB;

use Auth;
use \App\Models\topic;
use \App\Models\post;
use \App\Models\User;
use \App\Models\tag;

class postController extends Controller
{
    protected $post;
    protected $user;
    protected $topic;
    protected $tag;
   
    public function __construct(post $post, User $user,  topic $topic, tag $tag){
        $this->post = $post;
        $this->user = $user;
        $this->topic = $topic;
        $this->tag = $tag;
    }

    public function getListPost() {
        $posts = $this->post->getListPost();
        return view('admin.post.list', compact('posts'));
    }

    public function getCreate() {
    	$topic = $this->topic->getTopic();
        $tag = $this->tag->getTag();
    	return view('admin.post.create', ['topic'=>$topic, 'tag'=>$tag]);
    }

    public function postCreate(PostRequest $request) {
        $url = null;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            if(!checkExtensionImage($ext)) {
                return redirect('admin/post/create')->with('loi', 'Không hỗ trợ định dạng file này!');
            }
            $url = substr(time() . mt_rand() . '_' . $file->getClientOriginalName(), -190); 
            while(file_exists('upload/post'  . $url)) {
                $url = substr(time() . mt_rand() . '_' . $file->getClientOriginalName(), -190);
            }
            $file->move('upload/post', $url);
        }
        $this->post->createPost($request, $url);
        return redirect('admin/post/list')->with('thongbao','Thêm thành công '.$request->title);
    }

    public function getUpdate($idpost) {
        $post = $this->post->getPost($idpost);
        $topic = $this->topic->getTopic();
        $tags = $this->tag->getTag();
        $tag = $post->tag()->get();
        return view('admin.post.update', ['post'=>$post, 'topic'=>$topic, 'tag'=>$tag, 'tags'=>$tags]);
    }

    public function postUpdate(Request $request, $idpost) {
        $post = $this->post->getPost($idpost);
        $this->validate(
            $request, 
            [
               'idTopic' => 'required',
               'title' => 'required|min:10|unique:post,title',
               'idTag' => 'required',
               'description' => 'required|min:10',
               'content' => 'required|min:10',
            ],
            [
               'idTopic.required' => 'Bạn chưa chọn topic',
               'title.required' => 'Bạn chưa nhap title',
               'title.unique' => 'Title đã tồn tại',
               'idTag.required' => 'Bạn chưa chọn tag',
               'description.required' => 'Bạn chưa nhập mo ta',
               'content.required' => 'Bạn chưa nhập content'
            ]
        );
        $url = $post->urlimage;
        if($request->hasFile('img')){
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            if(!checkExtensionImage($ext)) {
                return redirect('admin/post/create')->with('loi', 'Không hỗ trợ định dạng file này!');
            }
            $url = substr(time() . mt_rand() . '_' . $file->getClientOriginalName(), -190); 
            while(file_exists('upload/post'  . $url)) {
                $url = substr(time() . mt_rand() . '_' . $file->getClientOriginalName(), -190);
            }
            $file->move('upload/post', $url);
            if( $post->urlimage != null && file_exists('upload/post/' . $post->urlimage)) unlink('upload/post/' . $post->urlimage);
            $post->urlimage = $url;
            
        }
        $this->post->updatePost($request, $idpost, $url);
        return redirect('admin/post/list')->with('thongbao','Update thành công '.$request->title);
    }

    public function getDelete($idpost) {
        $post = $this->post->getPost($idpost);
        $title = cutString($post->title, 40);
        $urlimage = $post->urlimage;
        if($urlimage != null && file_exists('upload/post/' . $urlimage)) unlink('upload/post/' . $urlimage);
        $this->post->deletePost($idpost);
        return redirect('admin/post/list')->with('thongbao','Bạn đã xóa thành công'.$title); 
    }

}
