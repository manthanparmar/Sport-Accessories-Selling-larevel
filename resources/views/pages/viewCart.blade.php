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
  width: 75%;
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

<div style="margin:20px;">
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="row" >
<div class="col-md-12">
<div class="item-info-product">
<table class="table">
<thead>
    <tr>
      <th style="width:70em;">Product</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Discount</th>
      <th>Total</th> 
      <th>Action </th>     
    </tr>
</thead>
<tbody>
    <?php
    $totalDiscount=0;
    $totalPrice=0;
    ?>
@foreach($cartProduct as $cartPro)
    <?php $actualPrice=$cartPro->quantity *($cartPro->price - ($cartPro->price * ($cartPro->discount / 100)));
    $discountPrice=$cartPro->quantity *($cartPro->price * ($cartPro->discount / 100));

    $totalDiscount += $discountPrice;
    $totalPrice += $actualPrice;
    ?>
<tr style="height:15em;">
      <td style="width:70em;">
        <div class="row">
            <div class="col-md-4">
            <img src="UplodedData/ProductImage/{{$cartPro->image1}}" style = "height:250px;" class="img-fluid" alt="">
            </div>
            <div class="col-md-8">
                <h2>  {{$cartPro->productName}} </h2>
                <h5>  {{$cartPro->description}} </h5>
            </div>
        </div>
    </td>
      <td>{{$cartPro->price}} ₹ </td>
      <td>{{$cartPro->quantity}} </td>
      <td>{{$discountPrice}} ₹</td>
      <td>{{$actualPrice}} ₹</td>
      <td> <a href = "deleteCart/{{$cartPro->id}}" style = "font-size: 20px;">
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
      </svg>
      </a> </td>     
</tr>
@endforeach
</tbody>
<tfooter>
    <tr>
    <th style="width:70em;"></th>
      <th></th>
      <th></th>
      <th>{{$totalDiscount}} ₹</th>
      <th>{{$totalPrice}} ₹</th>  
    </tr>
</tfooter>
</table>
<div class="row">
    <div class="col-md-12" style="padding: 30px;">
   <a class="btn btn-lg btn-primary" style="float:right;" href="#checkOutAddressModel"> Check Out </a>
</div>
</div>
</div>
</div>
</div>
</div>



<!-- Display Address -->
<div id="checkOutAddressModel" class="overlay">
<div class="popup"> 
   <div>
            

            <h3 style="display: flex;
    justify-content: center;color: lightslategray;padding-top: .5em;">Select Address</h3>
            <a class="close" href="#">&times;</a>
            <div>
    <div style="display: flex;justify-content: flex-end;">
    <a style="margin-right: 3em;" href="/addressManage" class="btn btn-lg btn-outline-primary">Add Address</a>

</form>
</div>
            </div>
<form>
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
<div class="content">
<div class="card-body">
<hr>  
<div class="row" style="margin: 20px;">
@foreach($address as $add)
<div class="col-md-4" style="margin-top:2.5rem">
<div class="card border-success mb-3" style="max-width: 25rem; min-height:20rem;border-radius: 20px;    font-size: larger;
    color: lightslategray;" >
  <div class="card-header bg-transparent border-success"><input type="radio" name="addresses" value="{{$add->id}}" checked="true" /></div>
  <div class="card-body text-success">
    <h5 class="card-title">{{$add->name}}</h5>
    <p class="card-text">{{$add->addressLine1}} {{$add->addressLine2}} <br/>{{$add->city}}-{{$add->zipCode}},{{$add->state}}
<br/>Phone Number :{{$add->contactNo}}</p>

  </div>
  <div class="card-footer bg-transparent border-success">
    
</div>
</div>
</div>@endforeach

</div>
<hr>
<div style="display: flex;
    justify-content: flex-end;">
    <a style="margin-right: 2em;" href="/checkOut" class="btn btn-lg btn-outline-primary">Place Order</a>

</form>
</div>
            </div>
        </div>
</div>
</div>



@stop
