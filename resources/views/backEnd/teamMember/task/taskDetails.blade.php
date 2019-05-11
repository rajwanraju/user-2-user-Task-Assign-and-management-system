@extends('backEnd.master')
@section('body')

<section class="content">
    <div class="container-fluid">

      @if (session('errorArray'))
                           <div class="alert alert-danger">
                               @foreach($errors->all() AS $key => $value)
                               <strong><i class="fa fa-warning"></i> {{ $value }}</strong><br>
                               @endforeach
                           </div>
                           @endif
                           @if (session('error'))
                           <div class="alert alert-danger" id="error">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                               <strong>{{ session('error') }}</strong>
                           </div>
                           @endif
                           @if (session('success'))
                           <div class="alert alert-success" id="success">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                               <strong>{{ session('success') }}</strong>
                           </div>
                           @endif

        

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-center">
                            <strong>Task </strong> Details</h2>

                    </div>
                    <div class="tableBody">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                          
                                  
                            
                                <tbody>

                              <tr>
                                        <th>Title</th>
                                         <td>{{$task->title}}</td>

                                       </tr>
                                       <tr>
                                        <th>Owner Name</th>
                                         <td>{{$task->owner_name}}</td>
                                       </tr>
                                       <tr>
                                        <th>Phone</th>
                                          <td>{{$task->phone}}</td>
                                        </tr>
                                        <tr>
                                        <th>Appointment Date</th>
                                           <td>{{$task->appointmemt_date}}</td>
                                         </tr>
                                         <tr>
                                        <th>Address</th>
                                               <td>{{$task->address}}</td>
                                             </tr> 

                                         

                                             <tr>
                                        <th>Status</th>
                                         <td>{{$task->task_status}}</td></tr>
                                    </tr> 
                                      <tr>
                                        <th>Comment</th>
                                         <td>{{$task->comment}}</td></tr>
                                    </tr>
                                     
                                    
                                   
                               
                                     
                                     



                                </tbody>
                            </table>
                        </div>
                        <div class="row clearfix js-sweetalert">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                            <a class="btn btn-primary waves-effect" href="#" onclick="assign()">Task Status Change</a>
                                        </div>
                                        </div>

                          


                    </div>
                </div>




                  <div class="card" id="assign" style="display: none">
                                
                            <div class="card-header">Task Status Change</div>
                            <div class="card-body">
                              



                            <form class="form-horizontal" method="post" action="{{url('teamMember/task/statusChange')}}">
                               @csrf
                               <input type="hidden" name="task" value="{{$task->id}}">

                               <div class="form-group row">
                                   <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Task Status') }}</label>

                                   <div class="col-md-3 offset-1">
                                       <select class="form-control" name="status">
                                      
                                      <option >Select Task Status</option>
                                      <option value="Task Done">Task Done</option>
                                      <option value="Waitting">Waitting</option>
                                      <option value="Reject">Reject</option>
                                  

                                  

                                       </select>
                                   </div>


                                  
                               </div>


                                <div class="form-group row">
                                   <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Task Comment') }}</label>



                                <div class="col-md-3 offset-1">
                                    <textarea class="form-control" name="member_comment"></textarea>
                                   </div>
                                   </div>
                               <br>
                               <br>


                                <div class="form-group row mb-0">
                                   <div class="col-md-6 offset-md-4">
                                       <button class="btn btn-primary">
                                           {{ __('Save') }}
                                       </button>
                                   </div>
                               </div>
                             </form>




                            </div>


                              </div>








            </div>

        </div>



    </div>
</section>

<script type="text/javascript">
  
function assign(){


$('#assign').show();

}


</script>
@endsection
