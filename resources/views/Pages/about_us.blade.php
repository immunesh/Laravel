@extends('layouts.about')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner overview-bgi" style="background: rgba(0, 0, 0, 0.04) url(../img/banner/banner-3.jpg) top left repeat; background-size:cover; background-position:center; background-repeat:no-repeat ">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>ABOUT US</h1>
            <ul class="breadcrumbs">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->
<!-- About city estate start -->
<div class="about-real-estate  content-area-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <div class="about-slider-box simple-slider">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/properties/properties-1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/properties/properties-2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/properties/properties-3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="slider-mover-left slider-btn-l" aria-hidden="true">
                                <i class="fa fa-angle-left"></i>
                            </span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="slider-mover-right slider-btn-r " aria-hidden="true">
                                 <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                    <div class="Properties-info d-none d-xl-block d-lg-block d-md-block d-sm-block">
                        <ul>
                            <li>
                                <i class="flaticon-hotel"></i>
                                <h4>Bed 3</h4>
                            </li>
                            <li>
                                <i class="flaticon-bathroom"></i>
                                <h4>Beds 2</h4>
                            </li>
                            <li>
                                <i class="flaticon-area"></i>
                                <h4>SQ.FT 3500</h4>
                            </li>
                            <li>
                                <i class="flaticon-mechanic"></i>
                                <h4>Garage 1</h4>
                            </li>
                            <li>
                                <i class="flaticon-balcony"></i>
                                <h4>Balcony 1</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div class="about-text">
                    <h3>Welcome to Rentobro</h3>
                    <p>Get your Owner or Tenant directly with No Broker involvement.
                        Post your property Get your property listed now for FREE with Rentobro to get suitable Tenants.
                        Avoid Brokerage.
                        we directly connect you to verified owners to save brokerage.
                        Free Listing.
                        Easy Listing Process, also using whatsapp.
                        shortlist without visit.
                        Extensive information makes it easy.
                        Rental Agreement.
                        Assistance in creating rental agreement and paper work.
                        Personal Assistance by our experts.
                        Assistance in Negotiations and Finalization of Deal.
                        Providing Suitable Tenants on Priority Basis.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About city estate end -->


<!-- Counters strat -->
<div class="counters overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-sale"></i>
                    <h1 class="counter">500</h1>
                    <p>Plus Listings For Sale</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-rent"></i>
                    <h1 class="counter">1000</h1>
                    <p>Plus Listings For Rent</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-user"></i>
                    <h1 class="counter">300</h1>
                    <p>Plus Tenants</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-work"></i>
                    <h1 class="counter">3000</h1>
                    <p>Plus Owners</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters end -->

<!-- Helping sentar start -->
<div class="helping-sentar">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 align-self-center">
                <!-- Contact 1 start -->
                <div class="contact-2 pb-hediin-60">
                    <h5 class="clearfix">Always Support You</h5>
                    <h3 class="heading">How can we help</h3>
                    <form action="#" method="GET" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group name">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group email">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group subject">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group number">
                                    <input type="text" name="phone" class="form-control" placeholder="Number">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group message">
                                    <textarea class="form-control" name="message" placeholder="Write message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="send-btn">
                                    <button type="submit" class="btn btn-md button-theme">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Contact 1 end -->
            </div>
            <div class="offset-xl-1 col-xl-5 col-lg-6">
                <img src="img/avatar/avatar-10.png" alt="avatar-10" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Helping sentar end -->
@endsection