<!DOCTYPE html>
<html lang="en">
<head>
  <title>napaporn-khon-ngam</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/css/select2.min.css" >
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/register.css">
  <!-- <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css" />   -->
  <link href="https://fonts.googleapis.com/css?family=Dosis|Kanit|Mitr|Raleway:500" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/css/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="/css/sw.css" />


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/moment.min.js"></script>
  <!-- <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script> -->
  <script src="/js/select2.full.min.js"></script>
  <script type="text/javascript" src="/js/moment.min.js"></script>
  <script type="text/javascript" src="/js/daterangepicker.js"></script>
  <script type="text/javascript" src="/js/libs.js"></script>
  <script type="text/javascript" src="/js/sweetalert.min.js"></script>
  <script type="text/javascript" src="/js/messagebox.js"></script>  
  <script type="text/javascript" src="/js/vue.min.js"></script>  
  <!--$('#datetimepicker').data("DateTimePicker").FUNCTION()-->

<body>
<!--header-->
<nav class="navbar header-bg">
  <div class="container-fluid">
    <div class="navbar-header">
      <a id="odeo" class="navbar-brand" href="http://www.penguizz.local/#" style="font-size: 35px; color: #fff;height: 55px"><b>ODEO solution</b></a>
    </div>
   @yield('mainmenu')
  </div>
</nav>




  <div class="col-md-3">
  <br>
	@yield('content-left')
  </div>
  <div class="col-md-9">
  <br>
  @yield('content-right')
  @yield('pagination')
  </div>
  
  @yield('content')

<script>

</script>

<div id="modal-edit-content"></div>

</body>
</html>