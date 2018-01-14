<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
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


        return view('admin.index',compact('persons','bodys'));
    }




    //删除数据  
    public function getDelete(Request $request)
    {
        $id = $request->input('id');
        if(User::where('id',$id)->first()->delete()){
            return back()->with('info','删除成功!');
        }else{
            return back()->with('error','删除失败!');
        }
    }

    //编辑信息  改
    public function getEdit(Request $request)
    {
        $user = User::where('id',$request->only('id'))->first();

        return view('admin.user.update',['user'=>$user,'title'=>'添加用户']);
    }


    //查询信息
    public function user()
    {
        // $users = \DB::table('users');
        $bodys = \DB::table('tasks')->pluck('body','created_at','update_at');

        $users = \DB::table('users')->get();

        return view('admin.user',compact('users','bodys'));        
    }

}
