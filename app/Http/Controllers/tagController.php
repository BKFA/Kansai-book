<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use \App\Models\tag;

class tagController extends Controller
{
    protected $tag;

    public function __construct(tag $tag){
        $this->tag = $tag;
    }
    
    public function getListTag() {
        $tags = $this->tag->getTag();
    	return view('admin.tag.list', compact('tags'));
    }

    public function postAdd(Request $request) {
        $this->validate(
            $request, 
            [
                'nameTag' => 'required|min:3|max:100|unique:tag,tag'
            ],
            [
                'nameTag.required' => 'Bạn chưa nhập tag',
                'nameTag.min' => 'tag phải có độ dài từ 3 đến 100 ký tự',
                'nameTag.max' => 'tag phải có độ dài từ 3 đến 100 ký tự',
                'nameTag.unique' => 'tag đã tồn tại',
            ]
        );

        $this->tag->createTag($request);

        return redirect('admin/tag/list')->with('thongbao','Thêm thành công '.$request->nameTag);
    }

    public function postUpdate(Request $request, $idtag) {
        $this->validate(
            $request, 
            [
                'updateTag' => 'required|min:3|max:100|unique:tag,tag'
            ],
            [
                'updateTag.required' => 'Bạn chưa nhập tag',
                'updateTag.min' => 'tag phải có độ dài từ 3 đến 100 ký tự',
                'updateTag.max' => 'tag phải có độ dài từ 3 đến 100 ký tự',
                'updateTag.unique' => 'tag đã tồn tại',
            ]
         );

        $this->tag->updatetag($request, $idtag);

        return redirect('admin/tag/list')->with('thongbao','Sửa thành công '.$request->updatetag);
    }

    public function getDelete($idtag)
    {
        $this->tag->deleteTag($idtag);
        return redirect('admin/tag/list')->with('thongbao','Bạn đã xóa thành công'); 
    }
}
