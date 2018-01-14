<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //网站首页
    public function index()
    {
    	$body= \DB::table('tasks')->pluck('body');

    	return view('welcome',compact('body'));
    }
}
