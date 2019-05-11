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
                            <strong>My Member Task Done </strong> List</h2>

                    </div>
                    <div class="tableBody">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Owner Name</th>
                                        <th>Phone</th>
                                        <th>Appointment Date</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @forelse($tasks as $task)
                                    {{-- @if($loan->loan_status ==="approved") --}}
                                    <tr>

                                      <td><a href="{{url('teamLeader/taskDetails/'.$task->id)}}" style="color:RoyalBlue">{{$task->title}}</a></td>
                                      <td>{{$task->owner_name}}</td>
                                      <td>{{$task->phone}}</td>
                                      <td>{{$task->appointmemt_date}}</td>
                                      <td>{{$task->address}}</td>
                                      <td>{{$task->task_status}}</td>
                                     

                                    </tr>
                                  {{-- @else

                                  @endif --}}

                                  @empty

                                  <tr><td colspan="3">No Data Found</td></tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
</section>
@endsection
