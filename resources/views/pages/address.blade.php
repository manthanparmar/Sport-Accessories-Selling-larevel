@extends('layout.default')

@section('content')

<style>
    
.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
  z-index:1000000;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
  z-index: 100;
}
.popup .close:hover {
  color: #06D85F;
}

    </style>


<div class="row">
    <div class="col-md-12" style="padding: 30px;">
   <a class="btn btn-lg btn-primary" style="float:right;" href="#createAddressModel"> Add new </a>
</div>
</div>

<!-- create Address     -->
<div id="createAddressModel" class="overlay">
    <div class="popup"> 
   <div>
            <div>
            <h3>Create Address</h3>
            <a class="close" href="#">&times;</a>
		
            </div>
            <div class="content">
            <div class="card-body">
                    <form action="createAddress" method="post" style="text-align"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                    <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="name" name="name"
                                    placeholder="Full name" required=""/>
                            </div>
                            </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="address1" name="address1"
                                    placeholder="Street Address,Company Name" required="">
                            </div></div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="address2" name="address2"
                                    placeholder="Apartment , buliding , floor , etc." required="">
                            </div></div>
                       
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="city" name="city"
                                    placeholder="city" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="state" name="state"
                                    placeholder="state" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="number" style="font-size: larger;" class="p-3 form-control input-style" id="zipcode" name="zipcode"
                                    placeholder="ZipCode" required="">
                            </div>
                        </div> <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="contactNo" name="contactNo"
                                    placeholder="Phone Number" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-style" value="submit"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
    </div>


<!-- Display Address -->

<div class="row" style="margin: 20px;border: #cde5e5; border-style: solid; border-radius: 30px">
@foreach($address as $add)
<div class="col-md-3" style="margin-top:3rem">
<div class="card border-success mb-3" style="max-width: 25rem; min-height:20rem;border-radius: 20px;" >
  <div class="card-header bg-transparent border-success"></div>
  <div class="card-body text-success">
    <h5 class="card-title">{{$add->name}}</h5>
    <p class="card-text">{{$add->addressLine1}} {{$add->addressLine2}} <br/>{{$add->city}}-{{$add->zipCode}},{{$add->state}}
<br/>Phone Number :{{$add->contactNo}}</p>

  </div>
  <div class="card-footer bg-transparent border-success">
     <a href="#editModal-{{$add->id}}" > <button class="btn btn-primary" style="float:left;border-radius: 20px;">Edit</button></a>
<a href="deleteAddress/{{$add->id}}">  <button style="float:right; border-radius: 20px;" class="btn btn-danger">Delete</button></div></a>
</div>
</div>


<!-- Edit Address-->

 <div class="overlay" id="editModal-{{$add->id}}" >
    <div class="popup">
   <div>
   <div style="margin:10px;">
            <h2 style="    text-align: center;
    padding: 25px;">Edit Address</h2>
            <a class="close" href="#">&times;</a>
		
            </div>
            <div class="content">
            <form action="updateAddress" method="post" style="text-align"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                    <input type="hidden" name="id" value="{{$add->id}}" />
                    <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="name" name="name" value="{{$add->name}}"
                                    placeholder="Full name" required=""/>
                            </div>
                            </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="address1" name="address1" value="{{$add->addressLine1}}"
                                    placeholder="Street Address,Company Name" required="">
                            </div></div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="address2" name="address2" value="{{$add->addressLine2}}"
                                    placeholder="Apartment , buliding , floor , etc." required="">
                            </div></div>
                       
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="city" name="city" value="{{$add->city}}"
                                    placeholder="city" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="state" name="state" value="{{$add->state}}"
                                    placeholder="state" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="zipcode" name="zipcode" value="{{$add->zipCode}}"
                                    placeholder="ZipCode" required="">
                            </div>
                        </div> <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" style="font-size: larger;" class="p-3 form-control input-style" id="contactNo" name="contactNo" value="{{$add->contactNo}}"
                                    placeholder="Phone Number" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12" style="padding-left: 5em;padding-right: 5em;">
                                <input type="submit" class="btn btn-block btn-lg btn-primary btn-style" value="submit"></input>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
</div>
    </div>


@endforeach
</div>


@stop