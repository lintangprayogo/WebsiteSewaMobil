<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Redirect;
class HomeController extends Controller
{
    function index(){
    	if(Auth::User()){
    		return redirect()->route('dashboard');
    	}else {
			return view("login");
    	}
    	
    }
    function dashboard(){
    	return view("home");
    }
}
