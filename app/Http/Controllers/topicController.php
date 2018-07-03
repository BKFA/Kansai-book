<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topic;

class topicController extends Controller
{
    //
    public function getList() {
    	return view('admin.topic.list');
    }

    public function getCreate() {
    	return view('admin.topic.create');
    }

    public function postCreate() {

    }

    public function getUpdate() {
    	return view('admin.topic.update');
    }

    public function postUpdate() {
        
    }

}
