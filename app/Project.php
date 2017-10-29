<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'projects';

    public function addNewProject($title, $desc, $teamId, $targetDate){

    	$project = new Project();
    	$project->title = $title;
    	$project->desc = $desc;
    	$project->team_id = $teamId;
    	$project->target_timeframe = $targetDate;
    	$project->save();
    }
}
