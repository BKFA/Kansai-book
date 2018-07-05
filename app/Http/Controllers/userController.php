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
                'username.max'=>'USERNAME IS NOT EXCEEDING 30 SIGNS',
                'username.unique'=>'USERNAME EXISTED',
                'email.unique'=>'EMAIL EXISTED',
            ]
        );
    	$createUser = new users;
    	$createUser->username=$request->username;
    	$createUser->password=bcrypt($request->password);
    	$createUser->email=$request->email;
    	$createUser->name=$request->name;
    	$createUser->age=$request->age;
    	$createUser->job=$request->job;
    	if($request->auth=="Admin"){
    		$createUser->idauth=1;
    	}
    	else {
    		$createUser->idauth=0;	
    	}
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
        $this->validate($request,
            [
                'username'=>'|max:30|',
               
            ],
            [
                'username.max'=>'USERNAME IS NOT EXCEEDING 30 CHARECTERS',
            ]
        );
    	$updateUser = users::find($iduser);
    	$updateUser->username=$request->username;
    	$updateUser->password=bcrypt($request->password);
    	$updateUser->email=$request->email;
    	$updateUser->name=$request->name;
    	$updateUser->age=$request->age;
    	$updateUser->job=$request->job;
    	if($request->auth=="Admin"){
    		$updateUser->idauth=1;
    	}
    	else $updateUser->idauth=0;
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
