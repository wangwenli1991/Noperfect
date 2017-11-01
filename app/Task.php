<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public static function inComplete()
    {
    	return static::where('completed',0)->get();
    }
}
