<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topic;
use App\Models\post;
use App\Models\User;

class postController extends Controller
{
    public function getList() {
    	$post = post::all();
    	return view('admin.post.list', ['post'=>$post]);
    }

    public function getCreate() {
    	$topic = topic::all();
    	$user = User::all();
    	return view('admin.post.create', ['topic'=>$topic], ['user'=>$user]);
    }

    public function postCreate() {
    	
    }

    public function getUpdate() {
    	return view('admin.post.update');
    }

    public function postUpdate() {
        
    }
}
