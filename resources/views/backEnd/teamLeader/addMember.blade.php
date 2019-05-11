@extends('backEnd.master')
@section('body')

<section class="content">
    <div class="container-fluid">
        


<div class="col-md-8 offset-2">

  <div class="row clearfix">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="card">
                         <div class="header">
                             <h2 class="text-center">
                                 <strong>Team Member</strong> Register</h2>

                         </div>
                         <div class="body">
                             <form class="form-horizontal" method="post" action="{{url('teamLeader/save/member')}}">
                               @csrf

                               <div class="form-group row">
                                   <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                   <div class="col-md-6">
                                       <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                       @if ($errors->has('name'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('name') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                   <div class="col-md-6">
                                       <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                       @if ($errors->has('email'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('email') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>

                                <div class="form-group row">
                                   <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                   <div class="col-md-6">
                                       <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                       @if ($errors->has('phone'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('phone') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>


                                 <div class="form-group row">
                                   <label for="skill" class="col-md-4 col-form-label text-md-right">{{ __('Skill') }}</label>

                                   <div class="col-md-6">
                                       <input id="skill" type="text" class="form-control{{ $errors->has('skill') ? ' is-invalid' : '' }}" name="skill" value="{{ old('skill') }}" required autofocus>

                                       @if ($errors->has('skill'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('skill') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>

                                 <div class="form-group row">
                                   <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                   <div class="col-md-6">
                                       <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}" required autofocus>

                                       @if ($errors->has('location'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('location') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>










                               <div class="form-group row">
                                   <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                   <div class="col-md-6">
                                       <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                       @if ($errors->has('password'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('password') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                   <div class="col-md-6">
                                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                   </div>
                               </div>

                               <div class="form-group row mb-0">
                                   <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
                                           {{ __('Register') }}
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
