<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>OTS</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('backEnd/')}}/assets/images/favicon.ico" type="image/x-icon">

    <!-- Plugins Core Css -->
    <link href="{{asset('backEnd/')}}/assets/css/app.min.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{asset('backEnd/')}}/assets/css/style.css" rel="stylesheet" />

    <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('backEnd/')}}/assets/css/styles/all-themes.css" rel="stylesheet" />


</head>

<body>

    <div class="overlay"></div>
 
@include('backEnd.include.header')

    <div>

    @include('backEnd.include.sidebar')
  
      @include('backEnd.include.rightbar')
   
    </div>
  @yield('body')

<script>
function goBack() {
    window.history.back();
}
</script>

<script>
$(document).ready(function(){
    $("#success").delay(5000).slideUp(300);
});

</script>

<script>
$(document).ready(function(){
    $("#error").delay(10000).slideUp(300);
});

</script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <!-- Bootstrap JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
  <script src="{{asset('js/')}}/jquery.multi-select.js"></script>
  <script type="text/javascript">
  // run pre selected options
  $('#pre-selected-options').multiSelect();
  </script>  

  <script type="text/javascript">
  // run pre selected options
  $('#pre-selected-options1').multiSelect();
  </script>
    <!-- Plugins Js -->
    <script src="{{asset('backEnd/')}}/assets/js/app.min.js"></script>
    <script src="{{asset('backEnd/')}}/assets/js/chart.min.js"></script>
    <script src="{{asset('backEnd/')}}/assets/js/map.min.js"></script>

    
    <!-- Custom Js -->
    <script src="{{asset('backEnd/')}}/assets/js/admin.js"></script>
    <script src="{{asset('backEnd/')}}/assets/js/pages/index.js"></script>
    <script src="{{asset('backEnd/')}}/assets/js/demo.js"></script>
    <script src="{{asset('backEnd/')}}/assets/js/pages/charts/jquery-knob.js"></script>
    <script src="{{asset('backEnd/')}}/assets/js/pages/sparkline/sparkline-data.js"></script>
    <script src="{{asset('backEnd/')}}/assets/js/pages/medias/carousel.js"></script>

</body>
