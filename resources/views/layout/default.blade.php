<!DOCTYPE html>
<html lang="zxx">

<head>
    <title> SAS: Sport Accessories </title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Bootie Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
    <!-- //Fonts -->
    <script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->
	<!--/Style-CSS -->
	<style>
    .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
  right:0px;
}

.lineHeight{
    line-height: 2;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dot {
    height: 15px;
    width: 15px;
    background-color: red;
    border-radius: 50%;
    display: inline-block;
  }

.sec{
    position: relative;
    right: -13px;
    top:-22px;
}

.counter.counter-lg {
    top: -24px !important;
}



    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<div class="main-banner" id="home" style="height:5.5em;">
        <!-- header -->
        <header class="header">
            <div class="container-fluid px-lg-5">
                <!-- nav -->
                <nav>
                <a href="/">
                <img style = "height: 82px; width: 160px;" src="/images/logo1.png" alt="Logo"/>
                </a>    
                <?php 
                    if($request->session()->has('id'))
                    {
                ?>
                <a href="/viewCart" style="float:right;">
                <span class="counter counter-lg">
                <img style = "height: 50px; width: 50px;margin-top: 22px;" src="/images/cartIcon.png" alt="Logo"/>
                <span style="color:white;background-color: red;
    padding: 4px;
    border-radius: 100%;">
    
                        <?php 
                            if($request->session()->get('cartCount'))
                            {
                                echo $request->session()->get('cartCount');
                            }
                            else
                            {
                                echo "0";
                            }
                            ?>
           </span> 
            </span>
                </a>
                        <?php  }?>
                <?php
                            
                            ?>
                            <div class="dropdown" style = "display: inline-block;float: right;">                
                            <img style = "height: 40px;width: 40px;margin-top: 20px;margin-left: 13px;" src="/images/usericon.png" alt="Logo" />
                            <br/>
                            <div style="color:white;margin: 5px;max-width: 57px;overflow: hidden;white-space: nowrap;text-align: center;text-overflow: ellipsis;"><?php echo $request->session()->get('firstName')." ".$request->session()->get('lastName') ?> </div>
                            
                            <div class="dropdown-content" >
                            <?php 
                            if(!$request->session()->has('id'))
                            {
                            ?>
                            <a class="lineHeight" href="/login">Login</a>
                            <hr>
                            <a class="lineHeight" href="/register">Register</a>
                            <?php 
                            }
                            else
                            {
                            ?>

                            
                            
                            <?php if($request->session()->get('userType') == "ADMIN"){ ?><hr><a class="lineHeight" href="/cpanel/">Admin Tools</a> <?php } ?>
                            <hr>
                            <a class="lineHeight" href="/myProfile">My Account</a>
                            <hr>
                            <a class="lineHeight" href="/myOrders">My Orders</a>
                            <hr>
                            <a class="lineHeight" href="/addressManage">Addresses</a>
                            <hr>
                            <a class="lineHeight" href="/logout">Logout</a>

                            <?php
                            }
                            ?>
                            </div>
                            </div>
                            
                    <ul class="menu mt-2 py-4">
                        <li><a href="/">Home</a></li>
                        
                        <li><a href="aboutus">About</a></li>
                        @foreach($category as $cat)
                        <li><a href="/categoryProduct?catId={{$cat->id}}">{{$cat->categryName}}</a></li>
                        @endforeach
                        <li><a href="/contactus">Contact</a></li></ul>
                                                
                        
                        
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->
        

    </div>
    @yield('content')
    <footer>
        <div class="container">
            <div class="row footer-top">
                <div class="col-lg-4 footer-grid_section_w3layouts">
                <a href="/">
                <img style = "height: 104px; width: 180px;" src="/images/footerlogo.png" alt="Logo" />
                </a> <p>India's Trusted Online Sports Store</p>
                    <h4 class="sub-con-fo ad-info my-4">Catch on Social</h4>
                    <ul class="w3layouts_social_list list-unstyled">
                        <li>
                            <a href="#" class="w3pvt_facebook">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="w3pvt_twitter">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="w3pvt_dribble">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                        <li class="ml-2">
                            <a href="#" class="w3pvt_google">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8 footer-right">
                    <div class="row mt-lg-4 bottom-w3layouts-sec-nav mx-0">
                        <div class="col-md-4 footer-grid_section_w3layouts">
                            <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Information</h3>
                            <ul class="list-unstyled w3layouts-icons">
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li class="mt-3">
                                    <a href="aboutus">About Us</a>
                                </li>
                                <li class="mt-3">
                                    <a href="contactus">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                       
                        <div class="col-md-8 footer-grid_section_w3layouts my-md-0 my-5">
                            <h3 class="footer-title text-uppercase text-wh mb-lg-4 mb-3">Contact Info</h3>
                            <div class="contact-info">
                                <div class="footer-address-inf">
                                    <h4 class="ad-info mb-2">Phone</h4>
                                    <p>+91 9067573660</p>
                                </div>
                                <div class="footer-address-inf my-4">
                                    <h4 class="ad-info mb-2">Email </h4>
                                    <p><a href="mailto:info@example.com">manthanparmar88@gmail.com</a></p>
                                </div>
                                <div class="footer-address-inf">
                                    <h4 class="ad-info mb-2">Location</h4>
                                    <p>LJ Institutes of Computer Application</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="cpy-right text-left row">
                        <p class="col-md-10">©SAS 2020 All rights reserved.
                        </p>
                        <!-- move top icon -->
                        <a href="#home" class="move-top text-right col-md-2"><span class="fa fa-long-arrow-up" aria-hidden="true"></span></a>
                        <!-- //move top icon -->
                    </div>
                </div>
            </div>
        </div>
    </footer>



