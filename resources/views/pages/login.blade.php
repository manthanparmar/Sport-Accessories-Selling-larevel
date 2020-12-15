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
    <form action="loginUser" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="login" required="">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" required="">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="/forgotpassword">Forgot Password?</a>
      <br/>
      Don't have an account?
      <a class="underlineHover" href="/register">Register</a>
    </div>

    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif

  
  </div>
</div>

<script>
window.addEventListener('load', function() {
  const urlParams = new URLSearchParams(window.location.search);
const myParam = urlParams.get('return');
if(myParam)
{
  alert('Please Login first!!');
}
});
</script>
@stop