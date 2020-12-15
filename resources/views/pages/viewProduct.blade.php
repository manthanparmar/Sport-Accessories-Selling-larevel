@extends('layout.default')

@section('content')

      <link href="/GallaryAsset/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/GallaryAsset/js/jquery-1.11.0.min.js"></script>
    <!-- Custom Theme files -->
    <link href="/GallaryAsset/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shoplist Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--Google Fonts-->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="/GallaryAsset/js/move-top.js"></script>
    <script type="text/javascript" src="/GallaryAsset/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smoth-scrolling -->
    <!--flex slider-->
    <script defer src="/GallaryAsset/js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="/GallaryAsset/css/flexslider.css" type="text/css" media="screen" />

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!--flex slider-->
    <script src="/GallaryAsset/js/imagezoom.js"></script>
    <script src="/GallaryAsset/js/simpleCart.min.js">
    </script>
    <script src="/GallaryAsset/js/bootstrap.min.js"></script>
</head>

<body>
    <!--header strat here-->

    <!--single start here-->
    <div class="single">
        <div class="container">
            <div class="single-main">
                <div class="single-top-main">
                    <div class="col-md-5 single-top">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="/UplodedData/ProductImage/{{$pro->image1}}">
                                    <div class="thumb-image"> <img src="/UplodedData/ProductImage/{{$pro->image1}}" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                                <li data-thumb="/UplodedData/ProductImage/{{$pro->image2}}">
                                    <div class="thumb-image"> <img src="/UplodedData/ProductImage/{{$pro->image2}}" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                                <li data-thumb="/UplodedData/ProductImage/{{$pro->image3}}">
                                    <div class="thumb-image"> <img src="/UplodedData/ProductImage/{{$pro->image2}}" data-imagezoom="true" class="img-responsive"> </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7 single-top-left simpleCart_shelfItem">
                        <h2>Undercover</h2>
                        <h1>{{$pro->productName}}</h1>
                        <h3></h3>
                        <h6 class="item_price">{{$pro->price}}</h6>
                        <p>{{$pro->description}}</p>
                        <h4>Quantity</h4>
                        <ul class="bann-btns">
                           <form action="/addToCart" method="post">
                           <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                           <input type="hidden" name="productId" value="{{$pro->id}}"/>
                           <input type="number" name="quantity" max="{{$pro->quantity}}"/>
                            <li><button type="submit" class="item_add">Add To Cart</button></li>
                           </form>

                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>


             <div class="singlepage-product">
             @foreach($products as $catpro)
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
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
   

@stop