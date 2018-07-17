<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class testMailController extends Controller
{
    public function test()
    {
    	return view('testMail');
    }
    public function hanldeMail(Request $request)
    {
    	$input = $request->all();
        Mail::send('mailSend', array('email'=>$input["email"], 'content'=>$input['comment']), function($message) use ($input){
	        $message->to($input["email"], 'Visitor')->subject('Feedback!');
	        $message->from('zxtinkerxz1@gmail.com','duoc gui boi thai dep trai');
	    });
    	return view('welcome');
    }
}
