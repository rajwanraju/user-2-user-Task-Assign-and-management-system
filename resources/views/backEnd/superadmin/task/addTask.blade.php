@extends('backEnd.master')
@section('body')

<section class="content">
    <div class="container-fluid">
        


<div class="col-md-12">

  <div class="row clearfix">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="card">
                         <div class="header">
                             <h2 class="text-center">
                                 <strong>Add Task Form</strong></h2>

                         </div>
                         <div class="body">
                             <form class="form-horizontal" method="post" action="{{url('super-admin/save/Task')}}">
                               @csrf

                               <div class="form-group row">
                                   <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Task Title') }}</label>

                                   <div class="col-md-10">
                                       <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Task Title" value="{{ old('title') }}" required autofocus>

                                       @if ($errors->has('title'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('title') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>


                                    <div class="form-group row">
                                   <label for="owner" class="col-md-2 col-form-label text-md-right">{{ __('Owner Name') }}</label>

                                   <div class="col-md-10">
                                    <div class="row">
                                      <div class="col-md-4">
                                       <select class="form-control" name="surName">
                                         
                                      <option value="Mr.">Mr.</option>
                                      <option value="Mrs.">Mrs.</option>
                                      <option value="Miss.">Miss.</option>

                                       </select>
                                     </div>
                                     <div class="col-md-7 offset-1">

                                       <input id="owner" type="text" class="form-control{{ $errors->has('owner') ? ' is-invalid' : '' }}" name="owner" placeholder="Owner Name" value="{{ old('owner') }}" required autofocus>
                                     </div>

                                    
                                   </div>
                               </div>
                               </div>



                                    <div class="form-group row">
                                       <div class="col-md-6">
                                    <div class="row">
                                   <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-8">
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="123456789" value="{{ old('phone') }}" required autofocus>
                                     </div>

                                 </div>
                               </div>

                                   <div class="col-md-6">
                                    <div class="row">
                                    <label for="alternative" class="col-md-4 col-form-label text-md-right">{{ __('Alternative') }}</label>
                                     <div class="col-md-8">

                                       <input id="alternative" type="text" class="form-control{{ $errors->has('alternative') ? ' is-invalid' : '' }}" name="alternative" value="{{ old('alternative') }}" placeholder="123456789 or xxx@mail.com" required autofocus>
                                     </div>

                                    
                                   </div>
                               </div>
                               </div>






                                      <div class="form-group row">
                                       <div class="col-md-6">
                                    <div class="row">
                                   <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                    <div class="col-md-8">

                                       <select class="form-control" name="category">
                                         @foreach($categories as $category)
                                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                                  

                                      @endforeach

                                       </select>
                                  
                                     </div>

                                 </div>
                               </div>

                                   <div class="col-md-6">
                                    <div class="row">
                                    <label for="appointment" class="col-md-4 col-form-label text-md-right">{{ __('Appointment Date') }}</label>
                                     <div class="col-md-8">

                                       <input id="appointment" type="date" class="form-control{{ $errors->has('appointment') ? ' is-invalid' : '' }}" name="appointment" value="{{ old('appointment') }}" required autofocus>
                                     </div>

                                    
                                   </div>
                               </div>
                               </div>

                                 
                                  <div class="form-group row">
                                   <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>

                                   <div class="col-md-10">
                                     <textarea class="form-control" rows="2" name="address" placeholder="32/xxx,xxx-1234,BD"></textarea>

                                     
                                   </div>
                               </div>

                                  <div class="form-group row">
                                   <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Comment') }}</label>

                                   <div class="col-md-10">
                                     <textarea class="form-control" rows="2" name="comment" placeholder="Task Comment"></textarea>

                                     
                                   </div>
                               </div>
                              

                             

                               

                              

                               <div class="form-group row mb-0">
                                   <div class="col-md-6 offset-md-4">
                                       <button class="btn btn-primary">
                                           {{ __('Add Task') }}
                                       </button>
                                   </div>
                               </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>


</div>


    </div>
</section>
@endsection
