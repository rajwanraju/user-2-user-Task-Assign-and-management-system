<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Role;
use App\Profile;
use DB;
use Auth;


class TeamLeaderController extends Controller
{
  public function index(){

  	$teamLeader = Profile::where('user_id',Auth::user()->id)->first();

  	$member = Profile::where('skill',$teamLeader->skill)->count();

 $taskCount = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('team_leader',Auth::user()->id)
->where('tasks.task_status','!=','Task Done')
->count();  


$taskDone = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('team_leader',Auth::user()->id)
->where('tasks.task_status','Task Done')
->count();	

$tasks = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('team_leader',Auth::user()->id)
->where('tasks.task_status','!=','Task Done')
->OrderBy('id','desc')
->take(3)
->get();


  	return view('backEnd.dashboard.TeamleaderDahboard',compact('taskCount','taskDone','tasks','member'));
  }

  public function teamMembers(){
$teamLeader = DB::table('users')
->join('profiles','users.id','profiles.user_id')
->select('profiles.*','users.name','users.id','users.email')
->where('users.id',Auth::user()->id)
->first();


$data = User::join('profiles','users.id','profiles.user_id')
->select('profiles.*','users.name','users.id','users.email')
->whereHas('roles', function($q){$q->whereIn('roles.name', ['TeamMember']);})
->where('profiles.skill',$teamLeader->skill)
->paginate(8);
 // return $data;
  	return view('backEnd.teamLeader.memberList',compact('data'));
  }


public function teamMembersAdd(){


	return view('backEnd.teamLeader.addMember');


}

public function teamMembersSave(Request $request){


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
              $user->attachRole(Role::where('name','TeamMember')->first());



      $profile = new Profile();
      $profile->user_id = $user->id;
      $profile->phone = $request->phone;
      $profile->skill = $request->skill;
      $profile->location = $request->location;
      $profile->save();

      return redirect()->back()->with('success','New Team Member Added');


}



public function taskList(){



$tasks = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('tasks.task_status','!=','Task Done')
->OrderBy('id','desc')
->get();
return view('backEnd.teamLeader.task.taskList',compact('tasks'));

}

public function taskDetails($id){

$teamLeader = $data = DB::table('users')
->join('profiles','users.id','profiles.user_id')
->select('profiles.*','users.id')
->where('users.id',Auth::user()->id)
->first();

$task = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('tasks.id',$id)
->first();


$users =  User::whereHas('roles', function($q){$q->whereIn('roles.name', ['TeamMember']);})->get();

 // dd ($users);


return view('backEnd.teamLeader.task.taskDetails',compact('task','users','teamLeader'));

}

public function taskAssign(Request $request){


// return $request;
	$data = Task::where('id',$request->task)->first();
	$data->member_id = $request->teamLeader;
	$data->save();

	return redirect()->back()->with('success','Task Assign');

}


public function taskDone(){


$tasks = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('team_leader',Auth::user()->id)
->where('tasks.task_status','Task Done')
->OrderBy('id','desc')
->get();
return view('backEnd.teamLeader.task.taskDoneList',compact('tasks'));


}



}
