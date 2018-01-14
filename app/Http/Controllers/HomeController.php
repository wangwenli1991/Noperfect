<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $persons = \DB::table('users')->pluck('name','email','created_at','update_at');
        $bodys = \DB::table('tasks')->pluck('body','created_at','update_at');


        return view('home',compact('persons','bodys'));
    }
}
