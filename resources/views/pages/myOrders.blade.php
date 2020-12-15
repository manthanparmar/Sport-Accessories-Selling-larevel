@extends('layout.default')

@section('content')

<br/>
<br/>
<br/>
<div class="row" >
<div class="col-md-12">
<div class="item-info-product">
<table class="table">
<thead>
    <tr>
      <th style="width:40em;">Product</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Discount</th>
      <th>Total</th> 
      <th>Action </th>     
    </tr>
</thead>
<tbody>
@foreach($myOrders as $myordr)
<tr style="height:15em;">
      <td style="width:40em;">
        <div class="row">
            <div class="col-md-7">
            <img src="UplodedData/ProductImage/{{$myordr->image1}}" style = "height:250px;width: 250px;" class="img-fluid" alt="">
            </div>
            <div class="col-md-5">
                <h2 style="color: #555555">  {{$myordr->productName}} </h2>
            </div>
        </div>
    </td>
      <td>{{$myordr->price}} ₹ </td>
      <td>{{$myordr->quantity}} </td>
      <td>{{$myordr->discount}} %</td>
      <td>{{$myordr->total}} ₹</td>
      <td>
      <?php 
      if($myordr->orderStatus=="COMPLETED"){
      ?>
      <span style="font-weight: bold;color: green;letter-spacing:1px">{{$myordr->orderStatus}} </span>
     
      <?php } ?>
      <?php 
      if($myordr->orderStatus=="PENDING"){
      ?>
      <span style="font-weight: bold;color: RED;letter-spacing:1px">{{$myordr->orderStatus}} </span>
     
      <?php } ?>
      <?php 
      if($myordr->orderStatus=="CANCELLED"){
      ?>
      <span style="font-weight: bold;color: RED;letter-spacing:1px">{{$myordr->orderStatus}} </span>
     
      <?php } ?>
      </td>     
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
@stop