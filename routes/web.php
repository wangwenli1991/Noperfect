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
Route::get('/admin/user','AdminController@user')->name('home');
