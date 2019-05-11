<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use App\Profile;
use DB;
use Auth;

class TeamMemberController extends Controller
{
   public function index(){

 $taskCount = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('member_id',Auth::user()->id)
->where('tasks.task_status','!=','Task Done')
->count();  


$taskDone = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('member_id',Auth::user()->id)
->where('tasks.task_status','Task Done')
->count();	

$tasks = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('member_id',Auth::user()->id)
->where('tasks.task_status','!=','Task Done')
->OrderBy('id','desc')
->take(3)
->get();

return view('backEnd.dashboard.memberDashboard',compact('taskCount','taskDone','tasks'));



   }




public function taskList(){



$tasks = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('member_id',Auth::user()->id)
->where('tasks.task_status','!=','Task Done')
->OrderBy('id','desc')
->get();
return view('backEnd.teamMember.task.taskList',compact('tasks'));

}

public function taskDoneList(){



$tasks = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('member_id',Auth::user()->id)
->where('tasks.task_status','Task Done')
->OrderBy('id','desc')
->get();
return view('backEnd.teamMember.task.taskDoneList',compact('tasks'));

}

public function taskDetails($id){



$task = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('tasks.id',$id)
->where('member_id',Auth::user()->id)
->first();



 // dd ($users);


return view('backEnd.teamMember.task.taskDetails',compact('task'));

}


public function taskstatus(Request $request)

{

	$data = Task::where('id',$request->task)->first();
	$data->task_status = $request->status;
	$data->member_comment = $request->comment;
	$data->save();

	return redirect()->back()->with('success','Task Status Changed');



}



}
