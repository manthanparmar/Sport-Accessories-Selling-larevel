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
    <form action="EditUserPassword" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
      <input type="text" id="oldPassword" class="fadeIn second" name="oldPassword" placeholder="Old Password" required="">
      <input required onChange="checkConfirmPassword('first')" type="text" class="fadeIn second" name="newPassword" placeholder="New Password" required="">   
      <input required onChange="checkConfirmPassword('second')" type="text" class="fadeIn second" name="confirmNewPassword" placeholder="Confirm New Password" required="">   
      <span style="display:none;color:red;" id="errorMsg">Password does not match</span>
      
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif

  </div>
</div>

<script type="text/javascript">
function checkConfirmPassword(type)
{

  var valueOne = document.getElementsByName('newPassword');
  var valueTwo = document.getElementsByName('confirmNewPassword');
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