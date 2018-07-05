<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
class userController extends Controller
{
    public function getList() {
    	$user=users::all();
    	return view('admin.user.list',['user'=>$user]);
    }

    public function getCreate(){
    	return view('admin.user.create');
    }

    public function postCreate(Request $request){
    	$this->validate($request,
            [
                'username'=>'|max:30|unique:users,username',
                'email'=>'|email|unique:users,email',
            ],
            [
                'username.max'=>'USERNAME KHÔNG ĐƯỢC VƯỢT QUÁ 30 KÝ TỰ',
                'username.unique'=>'USERNAME ĐÃ TỒN TẠI',
                'username.unique'=>'EMAIL ĐÃ TỒN TẠI',
            ]
        );
    	$createUser = new users;
    	$createUser->username=$request->username;
    	$createUser->password=bcrypt($request->password);
    	$createUser->email=$request->email;
    	$createUser->name=$request->name;
    	$createUser->age=$request->age;
    	$createUser->job=$request->job;
    	$createUser->idauth=$request->idauth;
    	$createUser->point=$request->point;
    	$createUser->education=$request->education;
    	$createUser->address=$request->address;
    	$createUser->japanlv=$request->japanlv;
    	$createUser->englv=$request->englv;
    	$createUser->save();

    	return redirect('admin/user/create')->with('notify','Create Successful :'.$request->name);

    }

    public function getUpdate($iduser){
    	$updateUser=users::find($iduser);
    	return view('admin.user.update',['updateUser'=>$updateUser]);
    }

    public function postUpdate(Request $request,$iduser){
    	$updateUser = users::find($iduser);
    	$updateUser->username=$request->username;
    	$updateUser->password=bcrypt($request->password);
    	$updateUser->email=$request->email;
    	$updateUser->name=$request->name;
    	$updateUser->age=$request->age;
    	$updateUser->job=$request->job;
    	$updateUser->idauth=$request->idauth;
    	$updateUser->point=$request->point;
    	$updateUser->education=$request->education;
    	$updateUser->address=$request->address;
    	$updateUser->japanlv=$request->japanlv;
    	$updateUser->englv=$request->englv;
    	$updateUser->save();

    	return redirect('admin/user/list')->with('notify','Update Successful :'.$request->name);
    }

    public function getDelete($iduser){
    	$deleteUser=users::find($iduser);
    	$nameUser=$deleteUser->name;
    	$deleteUser->delete();
    	return redirect('admin/user/list')->with('notify','Delete Successful : '.$nameUser);
    }

}
