<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Task;
use App\User;
use DB;

class SuperAdminController extends Controller
{
   public function categories(){

   	$categories = Category::all();

   	return view('backEnd.superadmin.category.categoryList',compact('categories'));

   }

public function addCategory(){

return view('backEnd.superadmin.category.addCategory');

}

public function saveCategory(Request $request){

// return $request;


$data = new Category();
$data->category_name = $request->category_name;
$data->description = $request->description;
$data->save();

return redirect('super-admin/task-Categories')->with('success','Category Added');

}

public function newTask(){

$categories = Category::all();

return view('backEnd.superadmin.task.addTask',compact('categories'));

}

public function saveTask(Request $request){

// return $request;
$task = new Task();
$task->title =$request->title;
$task->owner_name =$request->surName.$request->owner;
$task->category =$request->category;
$task->phone =$request->phone;
$task->alternative =$request->alternative;
$task->appointmemt_date =$request->appointment;
$task->address =$request->address;
$task->comment =$request->comment;
$task->task_status ='waitting';
$task->save();

return redirect('super-admin/taskList')->with('success','Task Added');
}

public function taskList(){



$tasks = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('tasks.task_status','!=','Task Done')
->OrderBy('id','desc')
->get();
return view('backEnd.superadmin.task.taskList',compact('tasks'));

}

public function taskDetails($id){



$task = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('tasks.id',$id)
->first();


$users =  User::whereHas('roles', function($q){$q->whereIn('roles.name', ['TeamLeader']);})->get();


return view('backEnd.superadmin.task.taskDetails',compact('task','users'));

}

public function taskAssign(Request $request){


// return $request;
	$data = Task::where('id',$request->task)->first();
	$data->team_leader = $request->teamLeader;$data->save();

	return redirect()->back()->with('success','Team Leader Assign');

}

public function taskDoneList(){


$tasks = DB::table('tasks')
->join('categories','tasks.category','categories.id')
->select('categories.category_name','tasks.*')
->where('tasks.task_status','Task Done')
->OrderBy('id','desc')
->get();
return view('backEnd.superadmin.task.taskDoneList',compact('tasks'));


}


}
