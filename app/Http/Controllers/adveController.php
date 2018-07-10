<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use \App\Models\adve;

class adveController extends Controller
{
    protected $adve;

    public function __construct(adve $adve){
        $this->adve = $adve;
    }
    
    public function getListAdve() {
        $adves = $this->adve->getAdve();
    	return view('admin.adve.list', compact('adves'));
    }
}
