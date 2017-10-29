<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use App\TaskTimeframe;

use DB;
use Response;
class TaskController extends Controller
{
    public function getAllTasks(){

    }


    public function getProjCatTasks(Request $request){
    	$this->validate($request, [
            'project_id' => 'required',
            'category_id' =>'required',
        ]);
    	$response = array(
    		'status'=>'success',
    		'tf_tasks' => Task::where([ ['project_id', '=', $request->project_id], ['category_id', '=', $request->category_id] ])->get()
    	);

        return Response::json($response);


    }

    public function getTeamMembers(Request $request){
    	
    	$project = Project::find($request->project_id);


    	$team_id = $project->team_id;
    	$members = DB::table('users')
    		->join('team_members', 'users.id', '=', 'team_members.user_id')
    		->select('users.id', 'users.username')
    		->where([['team_members.team_id', '=', $team_id]])
    		->get();

    	$response = array(
    		'status' => 'success',
    		'members' => $members
    	);

    	return Response::json($response);
    }


    public function getTaskTimeframe(Request $req){
        $this->validate($request, [
            'task_id' => 'required',
        ]);

        $taskTF = TaskTimeframe::where([['task_id', '=', $req->task_id]])->get();

        $response =array(
            'status'=> 'success',
            'taskTF' => $taskTF
        );

        return Response::json($response);
    }
}
