<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $table = 'tasks';

    public function addNewTask($projectId, $catId, $taskName){
    	$task = new Task();
    	$task->project_id = $projectId;
    	$task->category_id = $catId;
    	$task->task_name = $taskName;
    	$task->save();
    }
}
