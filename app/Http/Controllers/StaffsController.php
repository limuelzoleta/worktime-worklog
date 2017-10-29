<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class StaffsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function showHomePage(){
    	$tasks = DB::table('task_timeframes')
    					->join('tasks', 'tasks.id', '=', 'task_timeframes.task_id')
    					->select('tasks.task_name', 'tasks.id')
    					->where([['user_id', '=', Auth::user()->id]])
    					->get();


    	return view('index', compact('tasks'));
    }
}
