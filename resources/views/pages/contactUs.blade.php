@extends('layout.default')

@section('content')
    <!-- mian-content -->
    <!--//main-content-->
    <!---->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="\">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact Us</li>
    </ol>
    <!---->
    <!--// mian-content -->
    <!-- banner -->
    <section class="ab-info-main py-5">
        <div class="container py-3">
            <h3 class="tittle text-center"><span class="sub-tittle">Find Us</span> Contact Us</h3>
            <div class="row contact-main-info mt-5">
                <div class="col-md-6 contact-right-content">
                <form action="\createfeedback" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                    
                        <input type="text" name="name" placeholder="Name" required="">
                        <input type="email" class="email" name="email" placeholder="Email" required="">
                        <input type="text" name="phone" placeholder="Phone" required="">
                        <textarea name="message" placeholder="Message" required=""></textarea>
                        <div class="read mt-3">
                            <input type="submit" value="Submit"> </input>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 contact-left-content">
                    <div class="address-con">
                        <h4 class="mb-2"><span class="fa fa-phone-square" aria-hidden="true"></span> Phone</h4>
                        <p>+91 9067573660</p>
                        <p>+91 8000664696</p>
                    </div>
                    <div class="address-con my-4">
                        <h4 class="mb-2"><span class="fa fa-envelope-o" aria-hidden="true"></span> Email </h4>
                        <p><a href="mailto:manthanparmar88@gmail.com.com">manthanparmar88@gmail.com</a></p>
                        
                    </div>
                   
                    <div class="address-con">
                        <h4 class="mb-2"><span class="fa fa-map-marker" aria-hidden="true"></span> Location </h4>

                        <p>LJ Institutes of Computer Application</p>
                    </div>

                </div>

            </div>

    
            <div class="map-fo mt-lg-5 mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.896997881995!2d72.48512471408009!3d22.990814834969118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9aeaee40f1d5%3A0xd6fedf0de62e3062!2sLJ%20Institutes%20of%20Computer%20Applications!5e0!3m2!1sen!2sin!4v1598735715817!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </section>


    <!-- //contact -->
@stop