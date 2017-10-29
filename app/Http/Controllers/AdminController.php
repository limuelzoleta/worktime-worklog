<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DateTime;
use DB;

use App\Teams;
use App\User;
use App\TeamMembers;
use App\Category;
use App\Project;
use App\Task;
use App\TaskTimeframe;


class AdminController extends Controller
{
    /**
    * Check if user is logged in as an admin
    */
    public function __construct(){
		$this->middleware('admin');
	}

	/**
	* Show dashboard view
	*/
	public function showDashboard(){
		$teams = Teams::all();
        $projects = Project::all();
        $categories = Category::all();

        $staffs = DB::table('users')
            ->join('team_members', 'users.id', '=', 'team_members.user_id')
            ->join('teams', 'team_members.team_id', '=', 'teams.id')
            ->select('users.id', 'users.username', 'teams.name', 'users.position')
            ->orderBy('teams.id', 'desc')
            ->paginate(10);

		return view('admin_dashboard', compact('teams', 'projects', 'categories', 'staffs'));
	}

	public function addTeam(Request $request){
		$this->validate($request, [
    		'name' => 'required',
    		'description' => 'required'
    	]);

    	$team = new Teams;
    	$team->addNewTeam($request->name, $request->description);

    	return redirect(route('admin_dashboard'));
	}


	public function addMember(Request $request){
    	$this->validate($request, [
    		'team' => 'required',
    		'position' => 'required',
    		'settings' => 'required',
    		'username' => 'required',
    		'password' => 'required'
    	]);


    	$newUser = new User();
        if(!$newUser->checkIfExist($request->username)){
            $userId = $newUser->addNewUser($request->username, $request->password, $request->position);

            $newMember = new TeamMembers();
            $newMember->addNewMember($request->team, $userId, $request->settings);
            
            return redirect(route('admin_dashboard'));

        } else {
            $errorMsg = "New member not added: username already exist!";
            return Redirect::route('admin_dashboard')->withErrors(['errorMsg'=>$errorMsg]);
        }

	}


    public function addCategory(Request $request){
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $newCat = new Category();
        if(!$newCat->checkIfCatExist($request->category_name)){
            $newCat->addNewCategory($request->category_name);
            return redirect(route('admin_dashboard'));
        } else {
            $errorMsg = "New category not added: category name already exist!";
            return Redirect::route('admin_dashboard')->withErrors(['errorMsg'=>$errorMsg]);
        }

    }


    public function addTask(Request $request){
        $this->validate($request, [
            'task_project_id' => 'required',
            'task_cat_id' =>'required',
            'task_name' =>'required',
        ]);

        $task = new Task();
        $task->addNewTask($request->task_project_id, $request->task_cat_id, $request->task_name);

        return redirect(route('admin_dashboard'));


    }

    public function addProject(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'project_team' =>'required',
            'target_date' =>'required',
            'project_desc' =>'required',
        ]);
        $date = $request->target_date;
        $targetDate = date("Y-m-d H:i:s", strtotime($date));

        $project = new Project();
        $project->addNewProject($request->title, $request->project_desc, $request->project_team, $targetDate);
        return redirect(route('admin_dashboard'));

    }

    public function addTaskTimeframe(Request $request){
        $this->validate($request, [
            'tf_project_id' => 'required',
            'tf_cat_id' =>'required',
            'tf_task_id' =>'required',
            'tf_est_date' =>'required',
            'tf_est_time' =>'required',
            'tf_team_member' =>'required',
        ]);

        $date = $request->tf_est_date;
        $est_date = date("Y-m-d", strtotime($date));

        $time =  $request->tf_est_time;
        $est_time = str_replace(' ', '', $time) . ':00';

        $newTF = new TaskTimeframe();
        $newTF->addNewTimeframe(
            $request->tf_project_id,
            $request->tf_task_id,
            $est_date,
            $est_time,
            $request->tf_team_member
            );

        return redirect(route('admin_dashboard'));

    }
}
