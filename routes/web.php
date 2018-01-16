<?php

use App\Task;


Route::get('/','WelcomeController@index');


// Route::get('/test', function () {
	// $tasks = [
	// 	'1',
	// 	'2',
	// 	'3'

	// ];
// dd($tasks);
    // return view('welcome',compact('tasks'));
// });

// Route::get('/test1',function(){
// 	$tasks=DB::table('tasks')->get();
// 	return view('welcome',compact('tasks'));
// });

// Route::get('/tasks','TasksController@index');


// Route::get('/tasks/{task}','TasksController@tasks1');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/biao',function () {
// 	return view('template1.index');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin','AdminController@index')->name('home');


//后台user表
	//增加信息
		//跳到添加表单  /user/create
Route::get('/admin/user/create','AdminController@create')->name('home');
Route::post('/admin/user/store','AdminController@store')->name('home');

		//修改用户信息接收表单并提交
Route::get('/admin/user/createform','AdminController@create')->name('home');
Route::post('/admin/user/update','AdminController@update')->name('home');
Route::post('/admin/user/store','AdminController@store')->name('home');
	


	//删除信息

Route::get('/admin/user/delete/{id}','AdminController@delete')->name('home');
	//修改信息
Route::get('/admin/user/edit/{id}','AdminController@edit')->name('home');

	//user表显示
Route::get('/admin/user','AdminController@user')->name('home');

	
	


















