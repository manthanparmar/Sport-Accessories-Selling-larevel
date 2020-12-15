@extends('layout.adminLayout')

@section('contentAdmin')
<br/>
<br/>

<div>
<select  placeholder="Select" id="selectStatus" name="subcategoryId" class="form-control w-50"  style="display: inline-block;">
                          
            
 <option value="PENDING"><a href="cpanel/manageOrder">PENDING</a></option> 
 <option value="CANCELLED"><a href="cpanel/manageOrder">CANCELLED<a></option> 
 <option value="COMPLETED"><a>COMPLETED<a></option>                
   </select>
<button onClick = "SerchByStatus()">Search</button>

<script>

function SerchByStatus()
{
  debugger;
  var status = document.getElementById("selectStatus");

  var value = status.value;
  window.location.replace("?status="+value);
}




</script>

<button onClick = "print();">PRINT</button>
</div>
<br/>
<div class="card card_border mb-4">
            <div class="cards__heading">
                    <h3>Manage Order<span></span></h3>
                </div>
                <div class="card-body" style="max-height: 550px; overflow: scroll;">

            <table class="table table-hover">
  <thead>
    <tr style="background-color: #4755AB;border-color: #4755AB;color:#ffffff;font-size: 15px;">
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">User</th>
      <th scope="col">Quantity</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    
    <?php $index = 1; ?>
    @foreach($manageOrder as $mngOrdr)
    <tr style="font-size: 15px;">
      <th scope="row">{{$index}}</th>
      <td>{{$mngOrdr->productName}}</td>
      <td>{{$mngOrdr->firstName}} {{$mngOrdr->lastName}}</td>
      <td>{{$mngOrdr->quantity}}</td>
      <td>{{$mngOrdr->paymentMethod}}</td>
      <td>
     <?php if($mngOrdr->orderStatus == "PENDING"){ ?>
      <a href="confirmOrder/{{$mngOrdr->id}}" class="btn btn-primary btn-style" style="height: 40px;width: 180px;"  name="confirm">Confirm</a>
      <a href="cancelledOrder/{{$mngOrdr->id}}" class="btn btn-primary btn-style" style="height: 40px;width: 180px;" name="cancelled">Cancelled</button>
  
      <?php }
      else{ ?>
      {{$mngOrdr->orderStatus}} 
    <?php  }

      ?>
    
    </td>
     
     <?php $index++;?>
     </tr>
    @endforeach
    
  </tbody>
</table>
</div>
</div>

@stop