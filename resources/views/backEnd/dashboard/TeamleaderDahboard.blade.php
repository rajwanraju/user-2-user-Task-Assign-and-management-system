@extends('backEnd.master')
@section('body')


<section class="content">

    <div class="container-fluid">
     
       




  <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="support-box text-center cyan">
                      
                        <div class="text m-b-10"><h3>Your Profile</h3></div>
                        <h3 class="m-b-0">90% Complete
                          
                        </h3>
                     
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="support-box text-center purple">
                       
                        <div class="text m-b-10"><h3>Task Assign</h3></div>
                        <h3 class="m-b-0">{{$taskCount}}
                         
                       
                        </h3>
                 
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="support-box text-center blue">
                      
                        <div class="text m-b-10"><h3>Task Done </h3></div>
                        <h3 class="m-b-0">{{$taskDone}}
                       
                        </h3>
                      
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="support-box text-center green">
                       
                        <div class="text m-b-10"><h3>Member</h3></div>
                        <h3 class="m-b-0">{{$member}}
                     
                        </h3>
                  
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header" style="background: gray">
                            <h2 class="text-center" >
                                <strong>Recently Assign Task</strong></h2>
                      
                        </div>

                         <div class="table-responsive">
                                    <table id="new-orders-table" class="table table-striped table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Task Title </th>
                                                <th class="border-top-0">Category</th>
                                                <th class="border-top-0">Owner Name</th>
                                                <th class="border-top-0">Phone</th>
                                                <th class="border-top-0">Appointment Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @forelse($tasks as $task)
                                                <td class="text-truncate"><a href="{{url('teamMember/taskDetails/'.$task->id)}}" style="color:royalBlue">{{$task->title}}</a></td>
                                                <td class="text-truncate">
                                                    {{$task->category_name}}
                                                </td>
                                                <td class="text-truncate">{{$task->owner_name}}</td>
                                                <td class="text-truncate">{{$task->phone}}</td>
                                                <td class="text-truncate">{{$task->appointmemt_date}}</td>
                                            </tr>
                                            @empty
                                            <tr><td colspan="5">No Data Found</td></tr>
                                       @endforelse
                                        </tbody>
                                    </table>
                                        
                                </div>

 <div class="text-center">
                                    <a href="{{url('teamLeader/task-list')}}" class="b-b-primary text-primary">View All Task</a>
                                </div>
                       
                    </div>

                </div>
             
               
            </div>




  

 



@endsection
