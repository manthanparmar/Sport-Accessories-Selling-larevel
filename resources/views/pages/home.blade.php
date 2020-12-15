@extends('layout.default')

@section('content')
<br>
<br>
<form action="/categoryProduct" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                   
<div class="form-group row">  

<div class="col-md-6">
</div>
<div class="col-md-6" style="display:flex;justify-content: space-around;">
<select  placeholder="Select" name="subcategoryId" class="form-control w-50" value="0" style="display: inline-block;">
                            <option style="color:gray;" value="" disabled selected>Sub Category...</option>
             @foreach($subCategories as $subcat)
                                <option class="Cat_{{$subcat->categoryId}}_check" value="{{$subcat->id}}">{{$subcat->subCategryName}}</option> 
                            @endforeach
                            </select>
<input class="w-25 form-control" placeholder="Search product.." type="text" name="search" style="display: inline-block;"/>
<button class="btn btn-primary" style="width: 200px;" type="submit">Search</button>
</div>                 

</div>
</form>
<hr style="    margin-left: 2%;
    margin-right: 2%;
    margin-top: 2em;">
<section class="about py-5">
        <div class="container pb-lg-3">
            <h3 class="tittle text-center">New Arrivals</h3>
            <div class="row">
                @foreach($products as $pro)
                <div class="col-md-4 product-men">
                    <div class="product-shoe-info shoe text-center">
                        <div class="men-thumb-item">
                            

                            <img src="UplodedData/ProductImage/{{$pro->image1}}" style = "height:250px;" class="img-fluid" alt="">
                        
                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="/viewProduct/{{$pro->id}}">{{$pro->productName}} </a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money">{{$pro->price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </section>
   



<section class="about py-md-5 py-5">
        <div class="container-fluid">
            <div class="feature-grids row px-3">
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row">
                        <div class="icon-gd col-md-3 text-center"><span class="fa fa-truck" aria-hidden="true"></span></div>
                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">FREE SHIPPING</h3>
                            <p>On all order over $2000</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row bottom-gd2-active">
                        <div class="icon-gd col-md-3 text-center"><span class="fa fa-bullhorn" aria-hidden="true"></span></div>
                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">FREE RETURN</h3>
                            <p>On 1st exchange in 30 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row">
                        <div class="icon-gd col-md-3 text-center"> <span class="fa fa-gift" aria-hidden="true"></span></div>

                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">MEMBER DISCOUNT</h3>
                            <p>Register & save up to $29%</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 gd-bottom">
                    <div class="bottom-gd row">
                        <div class="icon-gd col-md-3 text-center"> <span class="fa fa-usd" aria-hidden="true"></span></div>
                        <div class="icon-gd-info col-md-9">
                            <h3 class="mb-2">PREMIUM SUPPORT</h3>
                            <p>Support 24 hours per day</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop