<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
use Auth;

class SuperAdminDashboard extends Controller
{
  public function index(){

     $taskCount = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('tasks.task_status','!=','Task Done')
->count();  


$taskDone = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('tasks.task_status','Task Done')
->count();

$teamLeaders =  User::whereHas('roles', function($q){$q->whereIn('roles.name', ['TeamLeader']);})->count();
$teamMembers =  User::whereHas('roles', function($q){$q->whereIn('roles.name', ['TeamMember']);})->count();


$tasks = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('team_leader',Auth::user()->id)
->where('tasks.task_status','!=','Task Done')
->OrderBy('id','desc')
->take(3)
->get();

    return view('backEnd.dashboard.Superadmindashboard',compact(
      'teamMembers','teamLeaders','taskDone','taskCount','tasks'));
  }
  public function teamLeaders(){


$teamLeaders =  User::whereHas('roles', function($q){$q->whereIn('roles.name', ['TeamLeader']);})->get();


    return view('backEnd.superadmin.user.teamLeaders',compact('teamLeaders'));
  }



public function addteamLeader(){


return view('backEnd.superadmin.user.addteamLeader');

}


public function saveteamLeader(Request $request){


$this->validate($request, [
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
              'password' => ['required', 'string', 'min:6', 'confirmed'],
          ]);

  $user= User::create([
                  'name' => $request['name'],
                  'email' => $request['email'],
                  'password' => bcrypt($request['password']),
                 
              ]);
              $user->attachRole(Role::where('name','TeamLeader')->first());


return redirect('super-admin/teamLeaders')->with('success','New Team Leader Added');

}

}
