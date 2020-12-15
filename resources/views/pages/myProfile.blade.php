@extends('layout.default')

@section('content')
<br/>


<link rel="stylesheet" href="css/loginstyle.css" type="text/css" media="all" />
<div class="wrapper fadeInDown">
  <div id="formContent" style="padding-top:5em;padding-bottom:5em;">
  
  <div class="form-group row">
        <div class="col-sm-2" style="padding-left: 3em;align-self: center;"> 
</div>
        <div class="col-sm-8" style="padding-left: 3em;align-self: center;background-color: #007bff;padding:10px;color:white"> 
        <h3>My Account
        </h3>         
        </div>
        <div class="col-sm-2" style="padding-left: 3em;align-self: center;"> 
</div>
</div>
<br/>
 <form action="editUserData" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
    <div class="form-group row">
        <div class="col-sm-4" style="padding-left: 3em;align-self: center">          
      <label>First Name</label>
        </div>
        <div class="col-sm-8">     
        <input required type="text" class="form-control fadeIn second" name="fname" placeholder="First Name" value="<?php echo $request->session()->get('firstName') ?>" required>
      </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-4" style="padding-left: 3em;align-self: center">          
      <label>Last Name</label>
        </div>
        <div class="col-sm-8">   
      <input required type="text" class="form-control fadeIn second" name="lname" placeholder="Last Name" value="<?php echo $request->session()->get('lastName') ?>" required="">
      </div>
      </div>
     
      <div class="form-group row">
        <div class="col-sm-4" style="padding-left: 3em;align-self: center">          
      <label>Email</label>
        </div>
        <div class="col-sm-8">   
         <input required type="text" class=" form-control fadeIn second" name="email" placeholder="email id" value="<?php echo $request->session()->get('email') ?>" required="">
         </div>
      </div>
     
         <div class="form-group row">
        <div class="col-sm-4" style="padding-left: 3em;align-self: center">          
      <label>Contact No</label>
        </div>
        <div class="col-sm-8">   
      <input required type="text" pattern="[0-9]{10}" class="form-control fadeIn second" min="10" max="10" name="contactNo" placeholder="Contact Number" value="<?php echo $request->session()->get('contactNo') ?>">
      </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12" style="padding-left: 3em;align-self: center">          
      <input type="submit" class="fadeIn fourth" value="Done">
</div>
</div>
      <div class="form-group row">
        <div class="col-sm-6" style="padding-left: 3em;align-self: center">      
      <a type="button" href="/addressManage" class="fadeIn fourth"> Manage Address</a> 
</div>
      <div class="col-sm-6" style="padding-left: 3em;align-self: center">          
    
      <a type="button" href="/changepassword" class="fadeIn fourth"> Change Password</a>
      </div>
</div>
</form>
</div>
</div>


 
 <br/>

 
@stop