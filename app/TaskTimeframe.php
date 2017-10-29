<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskTimeframe extends Model
{
    //
    protected $table = 'task_timeframes';

    public function addNewTimeframe($projectId, $taskId, $est_date, $est_time, $userId){
    	$taskTF = new TaskTimeframe();
    	$taskTF->project_id = $projectId;
    	$taskTF->task_id = $taskId;
    	$taskTF->estimated_date = $est_date;
    	$taskTF->estimated_time = $est_time;
    	$taskTF->user_id = $userId;

    	$taskTF->save();

    }
}
