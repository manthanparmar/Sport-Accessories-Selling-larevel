@extends('layout.default')

@section('content')

<section class="about py-5">
        <div class="container pb-lg-3">
            <h3 class="tittle text-center"></h3>
            <div class="row">
                @foreach($categoryProduct as $catpro)
                <div class="col-md-4 product-men">
                    <div class="product-shoe-info shoe text-center">
                        <div class="men-thumb-item">
                            

                            <img src="/UplodedData/ProductImage/{{$catpro->image1}}" style = "height:250px;" class="img-fluid" alt="">
                            <!-- <span class="product-new-top">New</span> -->
                        </div>
                        <div class="item-info-product">
                            <h4>
                                <a href="/viewProduct/{{$catpro->id}}">{{$catpro->productName}} </a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                    <span class="money">{{$catpro->price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </section>
@stop
