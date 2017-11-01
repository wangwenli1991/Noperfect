<?php

use App\Task;

Route::get('/test', function () {
	$tasks = [
		'下了班去吃饭',
		'吃了饭打豆豆',
		'写完东西回家睡觉'

	];
// dd($tasks);
    return view('welcome',compact('task'));
});

Route::get('/test1',function(){
	$tasks=DB::table('tasks')->get();
	return $tasks;
});

Route::get('/tasks','TasksController@index');


Route::get('/tasks/{task}','TasksController@tasks1');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/biao',function () {
// 	return view('template1.index');
// });