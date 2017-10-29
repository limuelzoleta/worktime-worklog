<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'StaffsController@showHomePage')->name('users_home');
Route::post('/get-tf-info', 'TaskController@getTaskTimeframe')->name('users_home.get_tf_info');



Route::get('/login', 'Auth\UserLoginController@showLogin')->name('login');
Route::post('/login', 'Auth\UserLoginController@processLogin')->name('login.login');
Route::get('/logout', 'Auth\UserLoginController@userLogout')->name('logout');




Route::prefix('admin')->group(function(){
	Route::get('dashboard', 'AdminController@showDashboard')->name('admin_dashboard');
	Route::post('dashboard/add-team', 'AdminController@addTeam')->name('admin.add_team');
	Route::post('dashboard/add-member', 'AdminController@addMember')->name('admin.add_member');
	Route::post('dashboard/add-category', 'AdminController@addCategory')->name('admin.add_category');
	Route::post('dashboard/add-task', 'AdminController@addTask')->name('admin.add_task');
	Route::post('dashboard/add-project', 'AdminController@addProject')->name('admin.add_project');
	Route::post('dashboard/add-timeframe', 'AdminController@addTaskTimeframe')->name('admin.add_timeframe');
	Route::post('dashboard/get-tasks', 'TaskController@getProjCatTasks')->name('admin.get_timeframe_tasks');
	Route::post('dashboard/get-team-members', 'TaskController@getTeamMembers')->name('admin.get_tf_team_members');
});