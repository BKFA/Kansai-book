<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // Display list user
    public function getList() {
    	$user = User::all();
    	return view('admin.user.list',['user'=>$user]);
    }

    // Display form create user
    public function getCreate(){
    	return view('admin.user.create');
    }

    // Create new user
    public function postCreate(Request $request){
    	$this->validate($request,
            [
                'name'=>'required|min:6|max:30',
                'username'=>'required|min:6|max:32|unique:users,username', 
                'password'=>'required|min:6|max:32',
                'confirmpassword'=>'required|min:6|max:32|same:password',
                'age'=>'required|integer',
                'email'=>'required|unique:users,email',
                'point'=>'required|integer',
            ],
            [
                'name.min'=>'NAME must have at least 6 characters',
                'name.max'=>'NAME must have at most 30 characters',
                'username.min'=>'USERNAME must have at least 6 characters',
                'username.max'=>'USERNAME must have at most 30 characters',
                'username.unique'=>'USERNAME Existed',
                'password.min'=>'PASSWORD must have at least 6 characters',
                'password.max'=>'PASSWORD must have at most 32 characters',
                'confirmpassword.min'=>'CONFIRM PASSWORD must have at least 6 characters',
                'confirmpassword.max'=>'CONFIRM PASSWORD must have at most 32 characters',
                'confirmpassword.same'=>'CONFIRM PASSWORD is not correct',
                'age.integer'=>'AGE must be number',
                'email.unique'=>'EMAIL Existed',
                'point.integer'=>'POINT must be number',
            ]
        );
    	$createUser = new User;
    	$createUser->username = $request->username;
    	$createUser->password = bcrypt($request->password);
    	$createUser->email = $request->email;
    	$createUser->name = $request->name;
    	$createUser->age = $request->age;
    	$createUser->job = $request->job;
    	$createUser->role = $request->auth;
    	$createUser->point = $request->point;
    	$createUser->education = $request->education;
    	$createUser->address = $request->address;
    	$createUser->japanlv = $request->japanlv;
    	$createUser->englv = $request->englv;
    	$createUser->save();

    	return redirect('admin/user/create')->with('notify','Create Successful :'.$request->name);

    }

    // Display form Update User
    public function getUpdate($id){
    	$updateUser = User::find($id);
    	return view('admin.user.update',['updateUser'=>$updateUser]);
    }

    // Update User
    public function postUpdate(Request $request,$id){
        $this->validate($request,
            [
                'name'=>'min:6|max:30',
                'username'=>'min:6|max:32|unique:users,username', 
                'password'=>'min:6|max:32',
                'confirmpassword'=>'min:6|max:32|same:password',
                'age'=>'integer',
                'email'=>'unique:User,email',
                'point'=>'integer',
            ],
            [
                'name.min'=>'NAME must have at least 6 characters',
                'name.max'=>'NAME must have at most 30 characters',
                'username.min'=>'USERNAME must have at least 6 characters',
                'username.max'=>'USERNAME must have at most 30 characters',
                'username.unique'=>'USERNAME Existed',
                'password.min'=>'PASSWORD must have at least 6 characters',
                'password.max'=>'PASSWORD must have at most 32 characters',
                'confirmpassword.min'=>'CONFIRM PASSWORD must have at least 6 characters',
                'confirmpassword.max'=>'CONFIRM PASSWORD must have at most 32 characters',
                'confirmpassword.same'=>'CONFIRM PASSWORD is not correct',
                'age.integer'=>'AGE must be number',
                'email.unique'=>'EMAIL Existed',
                'point.integer'=>'POINT must be number',
            ]
        );
    	$updateUser = User::find($id);
    	if($request->username != null) $updateUser->username = $request->username;
    	if($request->password != null) $updateUser->password = bcrypt($request->password);
    	if($request->email != null) $updateUser->email = $request->email;
    	if($request->name != null) $updateUser->name = $request->name;
    	if($request->age != null) $updateUser->age = $request->age;
    	if($request->job != null) $updateUser->job = $request->job;
    	if($request->auth != null) $updateUser->role = $request->auth;
    	if($request->point != null) $updateUser->point = $request->point;
    	if($request->education != null) $updateUser->education = $request->education;
    	if($request->address != null) $updateUser->address = $request->address;
    	if($request->japanlv != null) $updateUser->japanlv = $request->japanlv;
    	if($request->englv != null) $updateUser->englv = $request->englv;
    	$updateUser->save();

    	return redirect('admin/user/list')->with('notify','Update Successful :'.$request->name);
    }

    // Delete user
    public function getDelete($id){
    	$deleteUser=User::find($id);
        // Save name user before delete to show
    	$nameUser=$deleteUser->name;
    	$deleteUser->delete();
    	return redirect('admin/user/list')->with('notify','Delete Successful : '.$nameUser);
    }

}
