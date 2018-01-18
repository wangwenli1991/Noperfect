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



//增加新用户创建新用户create web  /admin/user/create
            //接收修改过的用户信息并插入数据库
    public function store(Request $request)
    {
        $name = $request->input('name');


        $validatedData = $request->validate([
            'id' => 'required|unique:posts|max:255',
            'name' => 'required',
        ]);     
    }
        //跳到添加用户表单
    public function create()
    {


return view('admin.create');
// return view('admin.user.create');
    }



//删除数据  delete   提交到 /delete/{id}
    public function delete(Request $request)
    {

        //把$id接过来
\DB::table('users')->where('id', '=', $id)->delete();
    return view('/admin/user');

    }

//改  编辑信息  update   修改信息 /update
    public function edit(Request $request, $id=NULL)
    {
        // $user = User::where('id',$request->only('id'))->first();
        // $user = DB::table('users')->where('id',$id);
$users = \DB::table('users')->where('id', $id)->first();


        return view('admin.update',compact('users'));
    }
    //update执行修改信息添加导数据库
    //执行编辑信息
public function update(Request $request){

    $validatedData = $request->validate([
        'name' => 'required|unique:posts|max:255',
        'email' => 'required',
    ]);


        if ($validator->fails()) {
            return redirect('admin/user/edit/$id')
                        ->withErrors($validator)
                        ->withInput();
        }
    // 验证通过，存储到数据库...
}



//查询信息   /admin/user
    public function user()
    {
        // $users = \DB::table('users');
        $bodys = \DB::table('tasks')->pluck('body','created_at','update_at');

        $users = \DB::table('users')->get();

        return view('admin.user',compact('users','bodys'));        
    }

    public function index()
    {
        

        $persons = \DB::table('users')->pluck('name','email','created_at','update_at');
        $bodys = \DB::table('tasks')->pluck('body','created_at','update_at');


        return view('admin.index',compact('persons','bodys'));
    }    

}
