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
    <form action="registerUser" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
      <input required type="text" class="fadeIn second" name="fname" placeholder="First Name" required="">
      <input required type="text" class="fadeIn second" name="lname" placeholder="Last Name" required="">
      <input required type="text" class="fadeIn second" name="email" placeholder="email id" required="">
      <input required onChange="checkConfirmPassword('first')" type="text" class="fadeIn second" name="password" placeholder="Password" required="">   
      <input required onChange="checkConfirmPassword('second')" type="text" class="fadeIn second" name="confirmpassword" placeholder="Confirm Password" required="">   
      <span style="display:none;color:red;" id="errorMsg">Password does not match</span>
      <input type="submit" class="fadeIn fourth" value="Register">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      Already have an account ?
      <a class="underlineHover" href="/login">Login</a>
    </div>

  </div>
</div>

<script type="text/javascript">
function checkConfirmPassword(type)
{

  var valueOne = document.getElementsByName('password');
  var valueTwo = document.getElementsByName('confirmpassword');
  var error = document.getElementById('errorMsg');

  if(valueOne[0] && valueTwo[0]){
  if(type === "first")
  {
    if(valueTwo[0].value){
      if(valueOne[0].value !== valueTwo[0].value)
    {
        error.style.display = 'block';
    }
    else
    {
      error.style.display = 'none';
    }
    }
  }
  else{
    if(valueOne[0].value !== valueTwo[0].value)
    {
        error.style.display = 'block';
    }
    else
    {
      error.style.display = 'none';
    }
  }
  }
}
</script>
@stop