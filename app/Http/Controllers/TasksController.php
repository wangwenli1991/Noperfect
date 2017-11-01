<?php

namespace App\Http\Controllers;

use App\Task;
class TasksController extends Controller
{
    public function tasks1($id)
    {

	$tasks=Task::find($id);

	return view('welcome',compact('tasks'));


    }

    public function tasks()
    {
    $tasks=Task::all();

	return view('welcome',compact('tasks'));

    }

    public function show()
    {
    	$task=Task::find($id);

    	return view('tasks.show',compact('task'));
    }
}
