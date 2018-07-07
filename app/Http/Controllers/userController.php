<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
class userController extends Controller
{
    // display list user
    public function getList() {
    	$user=users::all();
    	return view('admin.user.list',['user'=>$user]);
    }

    // call to view new create user
    public function getCreate(){
    	return view('admin.user.create');
    }

    // new create user
    public function postCreate(Request $request){
    	$this->validate($request,
            [
                'username'=>'|max:30|unique:users,username', 
                'password'=>'|min:8|max:32',
                'email'=>'|email|unique:users,email',
                'point'=>'|integer',
            ],
            [
                'username.max'=>'USERNAME IS NOT EXCEEDING 30 CHARECTERS',
                'password.min'=>'PASSWORD MUST HAVE AT LEAST 8 CHARECTERS',
                'password.max'=>'PASSWORD MUST HAVE AT MOST 32 CHARECTERS',
                'username.unique'=>'USERNAME EXISTED',
                'email.unique'=>'EMAIL EXISTED',
                'point.integer'=>'POINT MUST BE NUMBER',
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

    // call to view update a user
    public function getUpdate($iduser){
    	$updateUser=users::find($iduser);
    	return view('admin.user.update',['updateUser'=>$updateUser]);
    }

    // update a user
    public function postUpdate(Request $request,$iduser){
        $this->validate($request,
            [
                'username'=>'|max:30|',
                'password'=>'|min:8|max:32',
                'point'=>'|integer',
            ],
            [
                'username.max'=>'USERNAME IS NOT EXCEEDING 30 CHARECTERS',
                'password.min'=>'PASSWORD MUST HAVE AT LEAST 8 CHARECTERS',
                'password.max'=>'PASSWORD MUST HAVE AT MOST 32 CHARECTERS',
                'point.integer'=>'POINT MUST BE NUMBER',
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

    //delete a user
    public function getDelete($iduser){
    	$deleteUser=users::find($iduser);
    	$nameUser=$deleteUser->name; // Get to nameuser delete
    	$deleteUser->delete();
    	return redirect('admin/user/list')->with('notify','Delete Successful : '.$nameUser);
    }

}
