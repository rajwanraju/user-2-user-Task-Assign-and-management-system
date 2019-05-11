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
                                 <strong>Add Task Category</strong> </h2>

                         </div>
                         <div class="body">
                             <form class="form-horizontal" method="post" action="{{url('super-admin/save/category')}}">
                               @csrf

                               <div class="form-group row">
                                   <label for="category_name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                                   <div class="col-md-6">
                                       <input id="category_name" type="text" class="form-control{{ $errors->has('category_name') ? ' is-invalid' : '' }}" name="category_name" value="{{ old('category_name') }}" required autofocus>

                                       @if ($errors->has('category_name'))
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $errors->first('category_name') }}</strong>
                                           </span>
                                       @endif
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                   <div class="col-md-6">
                                     <textarea class="form-control" name="description" placeholder="Category Details"></textarea>

                                  
                                   </div>
                               </div>

                            

                               <div class="form-group row mb-0">
                                   <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
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


    </div>
</section>
@endsection
