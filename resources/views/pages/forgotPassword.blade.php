@extends('layout.default')

@section('content')
<link rel="stylesheet" href="css/loginstyle.css" type="text/css" media="all" />
<div class="wrapper fadeInDown" style="background-image: url('images/loginbanner.jpg');">
  <div id="formContent" style="margin-top:5em;margin-bottom:5em;">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img style = "height: 75px;width: 75px;margin: 22px;" src="images/userLogo.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="forgotPass" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
      <input type="text" id="forgotpPasswordEmail" class="fadeIn second" name="forgotpPasswordEmail" placeholder="login" required="">
     <input type="submit" class="fadeIn fourth" value="Log In">

    </form>
@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif
    <!-- Remind Passowrd -->
  
  </div>
</div>
@stop