<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    // Display list advertisement
    public function getList()
    {
        $advertisement = Advertisement::all();

        return view('admin.advertisement.list', ['advertisement' => $advertisement]);
    }

    // Call to view new create advertisement
    public function getCreate()
    {

        return view('admin.advertisement.create');
    }

    // Create new advertisement
    public function postCreate(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|unique:advertisement,name',
                'urlad' => 'required|min:10',

            ],
            [
                'name.required' => 'You have not filled out NAME ADVERTISEMENT yet',
                'name.min' => 'NAME ADVERTISEMENT must be at least 3 characters',
                'name.unique' => 'NAME ADVERTISEMENT Existed',
                'urlad.required' => 'You have not filled out URL ADVERTISEMENT yet',
                'urlad.min' => 'URL ADVERTISEMENT must be at least 10 characters and started by http:// or https://',
            ]
        );
        $postCreate = new Advertisement;
        $postCreate->name = $request->name;
        $postCreate->urladvertisement = $request->urlad;

        if ($request->hasFile('imgad')) {
            $img = $request->file('imgad');
            $ext = $img->getClientOriginalExtension();
            if (!checkExtensionImage($ext)) {

                return redirect('admin/post/create')->with('error', 'DO NOT SUPPORT THIS FORMAT!');
            }
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/imgad/' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/imgad', $urlimage);
            $postCreate->urlimage = $urlimage;
        } else {
            $postCreate->urlimage = 'default.jpg';
        }
        $postCreate->save();

        return redirect('admin/advertisement/list')->with('notify', 'Create successful : ' . $request->name);
    }

    // Display form update advertisement
    public function getUpdate($id)
    {
        $advertisement = Advertisement::find($id);

        return view('admin.advertisement.update', ['advertisement' => $advertisement]);
    }

    // Update advertisement
    public function postUpdate(Request $request, $id)
    {
        $postUpdate = Advertisement::find($id);
        $this->validate($request,
            [
                'name' => 'required|min:3',
                'urlad' => 'required|min:10',

            ],
            [
                'name.required' => 'You have not filled out NAME ADVERTISEMENT yet',
                'name.min' => 'NAME ADVERTISEMENT must be at least 3 characters',
                'urlad.required' => 'You have not filled out URL ADVERTISEMENT yet',
                'urlad.min' => 'URL ADVERTISEMENT must be at least 10 characters and started by http:// or https://',
            ]
        );

        if ($request->name != null) {
            $postUpdate->name = $request->name;
        }

        if ($request->urlad != null) {
            $postUpdate->urladvertisement = $request->urlad;
        }

        if ($request->hasFile('imgad')) {
            $img = $request->file('imgad');
            $ext = $img->getClientOriginalExtension();
            if (!checkExtensionImage($ext)) {

                return redirect('admin/update/advertisement/$id')->with('error', 'DO NOT SUPPORT THIS FORMAT!');
            }
            $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            while (file_exists('upload/images/imgad/' . $urlimage)) {
                $urlimage = substr(time() . mt_rand() . '_' . $img->getClientOriginalName(), -190);
            }
            $img->move('upload/images/imgad', $urlimage);
            if ($postUpdate->urlimage != 'default.jpg' && file_exists('upload/images/imgad/' . $advertisement->urlimage)) {
                unlink('upload/images/imgad/' . $postUpdate->urlimage);
            }

            $postUpdate->urlimage = $urlimage;
        }

        $postUpdate->save();

        return redirect('admin/advertisement/list')->with('notify', 'Update successful : ' . $request->name);
    }

    // Delete advertisement
    public function getDelete($id)
    {
        $deleteAdvertisement = Advertisement::find($id);
        //save nametopic before delete to show
        $nameAd = $deleteAdvertisement->name;
        $urlimage = $deleteAdvertisement->urlimage;
        if ($urlimage != 'default.jpg' && file_exists('upload/images/imgad/' . $urlimage)) {
            unlink('upload/images/imgad/' . $urlimage);
        }
        $deleteAdvertisement->delete();

        return redirect('admin/advertisement/list')->with('notify', 'Delete successful : ' . $nameAd);
    }
}
