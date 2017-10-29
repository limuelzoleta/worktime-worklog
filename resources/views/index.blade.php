@extends('layouts.users_main_layout')


@section('title')
WorkTime Worklog - Dashboard
@stop

@section('content')
@include('user_add_worklog')





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
			<button class="btn btn-primary add-member-modal"  data-toggle="modal" data-target="#myWorklogModal">
				<i class="glyphicon glyphicon-plus"></i> My Worklog
			</button>
			<button class="btn btn-warning"  data-toggle="modal" data-target="#addTeamModal">
				<i class="glyphicon glyphicon-time"></i> Worklog Chart Report
			</button>
			<button class="btn btn-success"  data-toggle="modal" data-target="#addTimeframeModal">
				<i class="glyphicon glyphicon-eye-open"></i> Timeframe
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
                    	<th>Task Name <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                    	<th>Location <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                     	<th>Collab <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                     	<th>Descrption <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                     	<th>Start <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                     	<th>End <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                     	<th>Total <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                     	<th>Type <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                     	<th>Breaklog <span class="pull-right sort-arrows"><i class="glyphicon glyphicon-sort"></i></span></th>
                   	</thead>
				    <tbody>
					    {{-- <tr>
					    	<td></td>
					    	<td></td>
					    	<td></td>
					    	<td></td>
					    	<td></td>
					    	<td></td>
					    	<td></td>
					    	<td></td>
					    	<td></td>
					    	<td></td>
					    </tr> --}}

					    <tr><td colspan="9">No data available in table</td></tr>
				    </tbody>
				</table>

				<div class="clearfix"></div>
				<div class="pull-right">
				</div>
				
                
            </div>
            
        </div>
	</div>
</div>
@stop