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
}
