<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //尝试使用请求提交更新表单时遇到此错误。
use App\User;
use Illuminate\Support\Facades\Input;//接收post传值
// use Illuminate\Http\Request;

use App\Http\Requests\RegistrationRequest;//执行php artisan make:request RegistrationRequest

//upload images
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithoutMiddleware;

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
    public function store(request $request)
    {
        $user=new User;
        $user=$request;

        $images=$request->file('images'); //1、使用laravel 自带的request类来获取一下文件
        $filedir="avatar/"; //2、定义图片上传路径
        $imagesName=$images->getClientOriginalName(); //3、获取上传图片的文件名
        $extension = $images -> getClientOriginalExtension(); //4、获取上传图片的后缀名
        $newImagesName=md5(time()).random_int(5,5).".".$extension;//5、重新命名上传文件名字
        $images->move($filedir,$newImagesName); //6、使用move方法移动文件.

        \DB::table('users')
            ->where('id', $request->id)
            ->update([
                'id'=>$request->id,
                'image'=>$newImagesName,
                'name' => $request->name,
                'email'=> $request->email,
                'password'=>$request->password,
                'created_at'=>$request->created_at,
                'updated_at'=>$request->updated_at,
             ]);

        return redirect('/admin/user');
    

    }
        //跳到添加用户表单
    public function create()
    {


return view('admin.create');
// return view('admin.user.create');
    }



//删除数据  delete   提交到 /delete/{id}
    public function delete(Request $request,$id=NULL)
    {
        

        // dd($id);
        //把$id接过来
\DB::table('users')->where('id', $id)->delete();
    return redirect('/admin/user');
    // return view('/admin/user',compact('users'));

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
