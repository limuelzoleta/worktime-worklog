@extends('layouts.admin_layout')

@section('title')
WorkTime Worklogs - Admin: Dashboard
@stop

@section('content')

@include('admin_add_team')
@include('admin_add_member')
@include('admin_add_category')
@include('admin_add_project')
@include('admin_add_task')
@include('admin_add_tasktimeframe')



<div class="container-fluid">
	@if($errors->any())
	<div class="alert alert-danger dashboard-error">
		<button type="button" id="close-dashboard-error" class="close" aria-hidden="true">×</button>
		<div class="row">
			<div class="col-md-11">
				{{$errors->first()}}
			</div>
		</div>
	</div>
	@endif
	<div class="row admin-ctrl-btns">
		<div class="col-md-12">
			<button class="btn btn-primary add-member-modal"  data-toggle="modal" data-target="#addMemberModal">
				<i class="glyphicon glyphicon-plus"></i> Add Member
			</button>
			<button class="btn btn-primary"  data-toggle="modal" data-target="#addTeamModal">
				<i class="glyphicon glyphicon-plus"></i> Add Team
			</button>
			<button class="btn btn-primary"  data-toggle="modal" data-target="#addCategoryModal">
				<i class="glyphicon glyphicon-plus"></i> Add Category
			</button>
			<button class="btn btn-primary"  data-toggle="modal" data-target="#addProjectModal">
				<i class="glyphicon glyphicon-plus"></i> Add Project
			</button>
			<button class="btn btn-primary"  data-toggle="modal" data-target="#addTaskModal">
				<i class="glyphicon glyphicon-plus"></i> Add Task
			</button>
			<button class="btn btn-success"  data-toggle="modal" data-target="#addTimeframeModal">
				<i class="glyphicon glyphicon-time"></i> Timeframe
			</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="select-entries">Show 
        		<select name="number_of_entries" id="num_entries" class="form-control">
        			<option value="10">10</option>
        			<option value="25">25</option>
        			<option value="50">50</option>
        			<option value="100">100</option>
        		</select>
        		entries
        	</div>
		</div>
		<div class="col-md-4">
			<div class="pull-right">
				Search: <input type="text" class="search" name="search" />
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-md-12">

       		<div class="table-responsive">
       			<table id="mytable" class="table table-bordred table-striped">
                	<thead>
                    	<th>Team <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                    	<th>Member <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                     	<th>Position <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                     	<th>Action</th>
                   	</thead>
				    <tbody>
				    	@foreach($staffs as $staff)
					    <tr>
					    	<td>{{$staff->name}}</td>
					    	<td>{{$staff->username}}</td>
					    	<td>{{$staff->position}}</td>
					    	<td>
					    		<button class="btn btn-success">Timeframe</button>
					    		<button class="btn btn-primary">Worklog</button>
					    		<button class="btn btn-warning">Chart</button>
					    	</td>
					    </tr>
					    @endforeach
				    </tbody>
				</table>


				<div class="clearfix"></div>
				<div class="pull-right">
					{{$staffs->links()}}
				</div>
				
                
            </div>
            
        </div>
	</div>
</div>

<script>
	$(function(){
		$("#close-dashboard-error").click(function(){
			$(".dashboard-error").hide('500');
		})
	});
</script>
@stop