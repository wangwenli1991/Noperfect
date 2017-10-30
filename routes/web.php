<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
	$tasks = [
		'下了班去吃饭',
		'吃了饭去星巴克写东西',
		'写完东西回家睡觉'

	];
    return view('welcome',compact('tasks'));
});

Route::get('/test1',function(){
	$tasks=DB::table('tasks')->get();
	return $tasks;
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/biao',function () {
// 	return view('template1.index');
// });