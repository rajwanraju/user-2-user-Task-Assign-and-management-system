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

          <div class="row clearfix js-sweetalert">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                            <a class="btn btn-primary waves-effect" href="{{url('super-admin/addNew/teamLeader')}}">Add Team Leader</a>
                                        </div>
                                        </div>

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-center">
                            <strong>Team Leader </strong> List</h2>

                    </div>
                    <div class="tableBody">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @forelse($teamLeaders as $user)
                                    {{-- @if($loan->loan_status ==="approved") --}}
                                    <tr>

                                      <td><a href="{{url('#')}}" style="color:RoyalBlue">{{$user->name}}</a></td>
                                      <td>{{$user->email}}</td>
                                      <td>{{"Team Leader"}}</td>
                                     

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
