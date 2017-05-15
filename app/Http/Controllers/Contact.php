<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
class Contact extends Controller
{
	    //
    public function getContact(){
    	return view('user.contact');
    }

   public function getInstroduction(){
    	return view('user.instroduction');
    }


}
