<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//upload images
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class WelcomeController extends Controller
{
    //网站首页
    public function index()
    {
    	$user=\DB::table('users')->pluck('name');

    	$body= \DB::table('tasks')->pluck('body');

    	return view('welcome',compact('body','user'));

        
    }
}
