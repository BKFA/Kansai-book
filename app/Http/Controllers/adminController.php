<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\system;
use App\Models\topic;

class adminController extends Controller
{
    //
    public function getAdminDashboard() {
    	return view('admin.traffic');
    }
}
