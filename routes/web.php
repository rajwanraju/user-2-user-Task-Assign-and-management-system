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

Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware'=>['role:superadmin','verified']], function() {

    Route::get('super-admin/homePage', 'SuperAdminDashboard@index');


    //team leader
    Route::get('super-admin/teamLeaders', 'SuperAdminDashboard@teamLeaders');
    Route::get('super-admin/addNew/teamLeader', 'SuperAdminDashboard@addteamLeader');
    Route::post('super-admin/save/teamLeader', 'SuperAdminDashboard@saveteamLeader');


//task Category

    Route::get('super-admin/task-Categories', 'SuperAdminController@categories');
    Route::get('super-admin/addNew/category', 'SuperAdminController@addCategory');
    Route::post('super-admin/save/category', 'SuperAdminController@saveCategory');

//task


    Route::get('super-admin/newTask', 'SuperAdminController@newTask');
    Route::post('super-admin/save/Task', 'SuperAdminController@saveTask');



    Route::get('super-admin/taskList', 'SuperAdminController@taskList');
    Route::get('super-admin/taskDetails/{id}', 'SuperAdminController@taskDetails');

Route::post('super-admin/task/assign', 'SuperAdminController@taskAssign');

Route::get('super-admin/task-done-list','SuperAdminController@taskDoneList');
        
});

Route::group(['middleware'=>['role:TeamLeader','verified']], function() {

Route::get('teamLeader/homePage','TeamLeaderController@index');
Route::get('teamLeader/team-members','TeamLeaderController@teamMembers');
Route::get('teamLeader/add/member','TeamLeaderController@teamMembersAdd');
Route::post('teamLeader/save/member','TeamLeaderController@teamMembersSave');
Route::get('teamLeader/task-list','TeamLeaderController@taskList');
Route::get('teamLeader/task-done-list','TeamLeaderController@taskDone');
Route::get('teamLeader/taskDetails/{id}', 'TeamLeaderController@taskDetails');
Route::post('teamLeader/task/assign', 'TeamLeaderController@taskAssign');


});



Route::group(['middleware'=>['role:TeamMember','verified']], function() {

Route::get('teamMember/homePage','TeamMemberController@index');
Route::get('teamMember/task-list','TeamMemberController@taskList');
Route::get('teamMember/task-done-list','TeamMemberController@taskDoneList');
Route::get('teamMember/taskDetails/{id}', 'TeamMemberController@taskDetails');
Route::post('teamMember/task/statusChange', 'TeamMemberController@taskstatus');

});













Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
