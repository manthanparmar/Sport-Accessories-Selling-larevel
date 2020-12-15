@extends('layout.default')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</br>
</br></br>
</br>


<div class="container">
<article class="card">
<div class="card-body p-5">

<ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
	<li class="nav-item">
	
		<input type="radio" name="addresses" value="COD" checked="true"/>
		 COD (Cash On Delivery)
	</li>
</ul>

<div class="tab-content">
<div class="tab-pane fade show active" id="nav-tab-card">
	<br/>
    <form role="form" action="/placeOrder" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
	
		</div>
	</div> <!-- form-group.// -->

	
	<button class="subscribe btn btn-primary btn-block" type="submit"> Confirm Order </button>
	</form>
</div> <!-- tab-pane.// -->
</div>
</br>
</br>

</br>
</br>

@stop