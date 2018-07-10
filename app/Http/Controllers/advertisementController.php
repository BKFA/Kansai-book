<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\advertisement;

class advertisementController extends Controller
{
    // Display list advertisement
    public function getList() {
        $advertisement = advertisement::all();
        return view('admin.advertisement.list',['advertisement'=>$advertisement]);
    }

    // Call to view new create advertisement
    public function getCreate() {
    	return view('admin.advertisement.create');
    }

    // Create new advertisement
    public function postCreate(Request $request) {
        $this->validate($request,
            [
                'namead'=>'required|min:3|unique:advertisement,nameadvertisement',
                'urlad'=>'required|min:10',
               
            ],
            [
                'namead.required'=>'You have not filled out NAME ADVERTISEMENT yet',
                'namead.min'=>'NAME ADVERTISEMENT must be at least 3 characters',
                'namead.unique'=>'NAME ADVERTISEMENT Existed',
                'urlad.required'=>'You have not filled out URL ADVERTISEMENT yet',
                'urlad.min'=>'URL ADVERTISEMENT must be at least 10 characters and started by http:// or https://',
            ]
        );
        $postCreate = new advertisement;
        $postCreate->nameadvertisement = $request->namead;
        $postCreate->urladvertisement = $request->urlad;

        if($request->hasFile('imgad')){
            $img = $request->file('imgad');
            $ext = $img->getClientOriginalExtension();
            if(!checkExtensionImage($ext)) {
                return redirect('admin/post/create')->with('error', 'DO NOT SUPPORT THIS FORMAT!');
            }
            $urlimage =  substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while(file_exists('upload/images/imgad/' . $urlimage)) {
                $urlimage =  substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/imgad', $urlimage);
            $postCreate->urlimage = $urlimage;
        }else{
            $postCreate->urlimage = 'default.jpg';
        }
        $postCreate->save();

        return redirect('admin/advertisement/list')->with('notify','Create successful : ' . $request->namead);
    }

    // Display form update advertisement
    public function getUpdate($idadvertisement) {
    	$advertisement = advertisement::find($idadvertisement);

    	return view('admin.advertisement.update', ['advertisement'=>$advertisement]);
    }

    // Update advertisement
    public function postUpdate(Request $request, $idadvertisement) {
    	$postUpdate = advertisement::find($idadvertisement);
        $this->validate($request,
            [
                'namead'=>'required|min:3',
                'urlad'=>'required|min:10',
               
            ],
            [
                'namead.required'=>'You have not filled out NAME ADVERTISEMENT yet',
                'namead.min'=>'NAME ADVERTISEMENT must be at least 3 characters',
                'urlad.required'=>'You have not filled out URL ADVERTISEMENT yet',
                'urlad.min'=>'URL ADVERTISEMENT must be at least 10 characters and started by http:// or https://',
            ]
        );
        
        if($request->namead != null) $postUpdate->nameadvertisement = $request->namead;
        if($request->urlad != null) $postUpdate->urladvertisement = $request->urlad;
        if($request->hasFile('imgad')){
            $img = $request->file('imgad');
            $ext = $img->getClientOriginalExtension();
            if(!checkExtensionImage($ext)) {
                return redirect('admin/update/post/$idpost')->with('error','DO NOT SUPPORT THIS FORMAT!');
            }
            $urlimage =  substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190); 
            while(file_exists('upload/images/imgad/' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/imgad', $urlimage);
            if($postUpdate->urlimage != 'default.jpg' && file_exists('upload/images/imgad/' . $post->urlimage)) unlink('upload/images/imgad/' . $postUpdate->urlimage);
            $postUpdate->urlimage = $urlimage;
        }

        $postUpdate->save();
        return redirect('admin/advertisement/list')->with('notify','Update successful : '.$request->namead); 
    }

    // Delete advertisement
    public function getDelete($idadvertisement){
        $deleteAdvertisement = advertisement::find($idadvertisement);
        //save nametopic before delete to show
        $nameAd = $deleteAdvertisement->nameadvertisement;
        $urlimage = $deleteAdvertisement->urlimage;
        if($urlimage != 'default.jpg' && file_exists('upload/images/imgad/' . $urlimage)) unlink('upload/images/imgad/' . $urlimage);
        $deleteAdvertisement->delete();
        return redirect('admin/advertisement/list')->with('notify','Delete successful : '.$nameAd);
    }
}
