@extends('layouts.homeL')
@section('content')
<!-- Banner start -->
<div class="banner banner" id="banner">
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
                <img class="d-block w-100" src="img/banner/banner-3.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-center">
                            <h1>JABALPUR’S LEADING NO BROKERAGE RENTAL PLATFORM</h1>
                            <p>
                                EXPLORE AND FIND BEST RENTAL SPACES ONLINE AT ZERO COST
                            </p>
                            <a href="{{ route('register') }}" class="btn btn-lg btn-theme">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item banner-max-height">
                <img class="d-block w-100" src="img/banner/banner-1.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-right">
                            <h1>JABALPUR’S LEADING NO BROKERAGE RENTAL PLATFORM</h1>
                            <p>
                                EXPLORE AND FIND BEST RENTAL SPACES ONLINE AT ZERO COST
                            </p>
                            <a href="{{ route('register') }}" class="btn btn-lg btn-theme">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item banner-max-height">
                <img class="d-block w-100" src="img/banner/banner-2.jpg" alt="banner">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                    <div class="carousel-content container">
                        <div class="text-left">
                            <h1>JABALPUR’S LEADING NO BROKERAGE RENTAL PLATFORM</h1>
                            <p>
                                EXPLORE AND FIND BEST RENTAL SPACES ONLINE AT ZERO COST
                            </p>
                            <a href="{{ route('register') }}" class="btn btn-lg btn-theme">Get Started Now</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
    </div>
    <div class="container search-options-btn-area">
        <a class="search-options-btn d-lg-none d-xl-none">
            <div class="search-options d-none d-xl-block d-lg-block">Search Options</div>
            <div class="icon"><i class="fa fa-chevron-up"></i></div>
        </a>
    </div>
    <!--bANNER END-->
    <!-- Search Section start -->
    <div class="search-section d-xl-block d-lg-block">
        <div class="container">
            <div class="search-section-area ssa2">
                <div class="search-area-inner">
                    <div class="search-contents">
                        <form method="Post" action="{{url('searchResult')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="selectpicker search-fields" name="any-status">
                                        
                                            <option>For Rent</option>
                                            <option>For Sale</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label>Type</label></br>
                                        <select class="search-fields" name="property-type">
                                            
                                                <option value="HouseorVilla">House/Villa</option>
                                                <option value="couple_friendly">Couple Friendly</option>
                                                <option value="agriculture_land">Agriculture Land</option>
                                                <option value="farmhouse">Farmhouse</option>
                                                <option value="flat">Flat</option>
                                                <option value="office_space">Office Space</option>
                                                <option value="shops">Shops</option>
                                                <option value="warehouse_godown">Warehouse/Godown</option>
                                                <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label>Bedrooms</label>
                                        <select class="selectpicker search-fields" name="bedrooms">
                                            
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>more than 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label>Bathrooms</label>
                                        <select class="selectpicker search-fields" name="bathrooms">
                                            
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>more than 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="selectpicker search-fields" name="city" id="city_name" onchange="city_select()">
                                            
                                            <option>Jabalpur</option>
                                            <option>Indore</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label>Neighbourhood</label>
                                        <select class="search-fields" name="neighbourhood" id="jabalpur">
                                            <option>Sadar</option>
                                            <option>Katanga</option>
                                            <option>Garakhpur</option>
                                            <option>Bus Stand</option>
                                            <option>Civil Line</option>
                                            <option>Others</option>
                                            <option>Adarsh nagar</option>
                                            <option>Airport Road</option>
                                            <option>Gorakpur</option>
                                            <option>Adhartal</option>
                                            <option>Amkhera</option>
                                            <option>Bahora bagh</option> 
                                            <option>Baldev bagh</option>
                                            <option>Bargi Hills</option>
                                            <option>Bihari</option>
                                            <option>Bhedaghat road</option>
                                            <option>GCF</option>
                                            <option>Cantt</option>
                                            <option>Civil Lines</option>
                                            <option>Dhanwantari Nagar</option>
                                            <option>Deendyal Chowk</option>
                                            <option>DAMOH NAKA</option>
                                            <option>Fuhara</option>
                                            <option>GCF</option>
                                            <option>Garha</option>
                                            <option>GwariGhat</option>
                                            <option>Ghamapur</option>
                                            <option>GhantaGHar</option>
                                            <option>Gohalpur</option>
                                            <option>Gorakhpur</option>
                                            <option>Gol Bazar</option>
                                            <option>Jabalpur Cantonment</option> 
                                            <option>Hathital</option>
                                            <option>Katanga</option>
                                            <option>Karmeta</option>
                                            <option>Khamaria</option>
                                            <option>Karamchand Chowk</option>
                                            <option>Labour Chowk</option>
                                            <option>Madan mahal</option>
                                            <option>Mahajrajpur</option>
                                            <option>Malviya chowk</option>
                                            <option>Marhatal (Civic center)</option>
                                            <option>Medical College</option>
                                            <option>Milauni Ganj</option>
                                            <option>Nagrath Chowk</option>
                                            <option>Napier Town</option>
                                            <option>Narmada Nagar</option>
                                            <option>Nayagaon</option>
                                            <option>Kanchghar</option>
                                            <option>Niwadganj</option>
                                            <option>Raddi Chowk</option>
                                            <option>Raksa</option>
                                            <option>Rampur</option>
                                            <option>Ranital</option>
                                            <option>Ranjhi</option>
                                            <option>Richai</option>
                                            <option>Rimjha</option>
                                            <option>Russle Chowk</option>
                                            <option>Sadar</option>
                                            <option>Sanjeevani Nagar</option>
                                            <option>sarafa</option>
                                            <option>Jabalpur Station Road</option>
                                            <option>Suhagi</option>
                                            <option>Tayebali chowk</option>
                                            <option>Tilahri</option>
                                            <option>Tewar</option>
                                            <option>Tilwara</option>
                                            <option>Umria</option>
                                            <option>Ukhri</option>
                                            <option>RDVV University Colony</option>
                                            <option>Vijay Nagar</option>
                                            <option>Wright town</option>
                                            <option>Yadav Colony</option>
                                        </select>
                                        <select class="search-fields" name="neighbourhood" id="indore" style="display: none">
                                            <option>Nipania</option>
                                            <option>Vijay Nagar</option>
                                            <option>Mahalaxmi Nagar</option>
                                            <option>Bicholi Mardana</option>
                                            <option>Bengali Square</option>
                                            <option>Scheme No. 54</option>
                                            <option>Saket Nagar</option>
                                            <option>Sukhalia</option>
                                            <option>Super Corridor</option>
                                            <option>Scheme No. 78</option>
                                            <option>AB Roadl</option>
                                            <option>Rau</option>
                                            <option>Dewas Naka</option> 
                                            <option>Bakhtawar Ram Nagar</option>
                                            <option>Sudama Nagar</option>
                                            <option>Manorama Ganj</option>
                                            <option>Tulsi Nagar</option>
                                            <option>Old Palasia</option>
                                            <option>Sai Kripa Colony</option>
                                            <option>Navlakha</option>
                                            <option>Khandwa Road</option>
                                            <option>Kanadia Rd</option>
                                            <option>Vandana Nagar</option>
                                            <option>Piplya Kumar</option>
                                            <option>Limbodi</option>
                                            <option>New Palasia</option>
                                            <option>Mhow</option>
                                            <option>Bypass Road</option>
                                            <option>Rajendra Nagar Colony</option>
                                            <option>Scheme No. 7</option>
                                            <option>Tilak Nagar</option>
                                            <option>Race Course Road</option>
                                            <option>Alok Nagar</option> 
                                            <option>Manavta Nagar</option>
                                            <option>Annapurna</option>
                                            <option>Talawali chanda</option>
                                            <option>Shreeji Valley Rd</option>
                                            <option>Scheme No. 140</option>
                                            <option>Shiv Dham Colony</option>
                                            <option>Pipaliyahana</option>
                                            <option>Usha Nagar</option>
                                            <option>Ujjain Road</option>
                                            <option>Khajrana</option>
                                            <option>Sheshadri Colony</option>
                                            <option>Suryadev Nagar</option>
                                            <option>Manishpuri</option>
                                            <option>Manu Shree Nagar</option>
                                            <option>Palakheri</option>
                                            <option>Bada Bangarda</option>
                                            <option>Jhalaria</option>
                                            <option>Maya Khedj</option>
                                            <option>Scheme No.114k</option>
                                            <option>Airport Road</option>
                                            <option>Manglaya Sadak</option>
                                            <option>Choithram</option>
                                            <option>Mundla Nayta</option>
                                            <option>Bijalpur</option>
                                            <option>Devas Road</option>
                                            <option>Vidur Nagar</option>
                                            <option>Devgurdiya</option>
                                            <option>Scheme No. 134</option>
                                            <option>Hatod</option>
                                            <option>Mr-10</option>
                                            <option>Manglia</option>
                                            <option>Rani Bhagh</option>
                                            <option>Palda</option>
                                            <option>Sanwer</option>
                                            <option>Datoda Road</option>
                                            <option>Chhota Bangarda</option>
                                            <option>Niranjanpur</option>
                                            <option>M G Road</option>
                                        
                                </select>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="range-slider">
                                        <label>Price</label></br>
                                        <div data-min="0" data-max="150000" data-unit="INR" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div> -->
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6" style="margin: auto; margin-bottom: 0px">
                                    <div class="form-group">
                                        <button class="search-button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

<!-- Search Section start -->
<!-- <div class="search-section search-area pb-hediin-12 bg-grea animated fadeInDown" id="search-style-1">
    <div class="container">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="search-contents">
                    <form method="post" action="{{url('/')}}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="selectpicker search-fields" name="any-status">
                                        <option>Status</option>
                                        <option>For Rent</option>
                                        <option>For Sale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label value="all_type">Type</label>
                                    <select class="search-fields" name="property_type">
                                        <option>All Types</option>
                                        <option value="HouseorVilla">House/Villa</option>
                                        <option value="couple_friendly">Couple Friendly</option>
                                        <option value="agriculture_land">Agriculture Land</option>
                                        <option value="farmhouse">Farmhouse</option>
                                        <option value="flat">Flat</option>
                                        <option value="office_space">Office Space</option>
                                        <option value="shops">Shops</option>
                                        <option value="warehouse_godown">Warehouse/Godown</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label>Bedrooms</label>
                                    <select class="selectpicker search-fields" name="bedrooms">
                                        <option>Bedrooms</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>more than 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label>Bathrooms</label>
                                    <select class="selectpicker search-fields" name="bathrooms">
                                        <option>Bathrooms</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>more than 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="selectpicker search-fields" name="city" id="hcity_name" onchange="mob_city_select()">
                                         
                                         <option>Jabalpur</option>
                                        <option>Indore</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <label>Neighbourhood</label>
                                    <select class="search-fields" name="neighbourhood" id="jabalpur_s">
                                        
                                        <option>Sadar</option>
                                        <option>Katanga</option>
                                        <option>Garakhpur</option>
                                        <option>Bus Stand</option>
                                        <option>Civil Line</option>
                                        <option>Others</option>
                                        <option>Adarsh nagar</option>
                                        <option>Airport Road</option>
                                        <option>Gorakpur</option>
                                        <option>Adhartal</option>
                                        <option>Amkhera</option>
                                        <option>Bahora bagh</option> 
                                        <option>Baldev bagh</option>
                                        <option>Bargi Hills</option>
                                        <option>Bihari</option>
                                        <option>Bhedaghat road</option>
                                        <option>GCF</option>
                                        <option>Cantt</option>
                                        <option>Civil Lines</option>
                                        <option>Dhanwantari Nagar</option>
                                        <option>Deendyal Chowk</option>
                                        <option>DAMOH NAKA</option>
                                        <option>Fuhara</option>
                                        <option>GCF</option>
                                        <option>Garha</option>
                                        <option>GwariGhat</option>
                                        <option>Ghamapur</option>
                                        <option>GhantaGHar</option>
                                        <option>Gohalpur</option>
                                        <option>Gorakhpur</option>
                                        <option>Gol Bazar</option>
                                        <option>Jabalpur Cantonment</option> 
                                        <option>Hathital</option>
                                        <option>Katanga</option>
                                        <option>Karmeta</option>
                                        <option>Khamaria</option>
                                        <option>Karamchand Chowk</option>
                                        <option>Labour Chowk</option>
                                        <option>Madan mahal</option>
                                        <option>Mahajrajpur</option>
                                        <option>Malviya chowk</option>
                                        <option>Marhatal (Civic center)</option>
                                        <option>Medical College</option>
                                        <option>Milauni Ganj</option>
                                        <option>Nagrath Chowk</option>
                                        <option>Napier Town</option>
                                        <option>Narmada Nagar</option>
                                        <option>Nayagaon</option>
                                        <option>Kanchghar</option>
                                        <option>Niwadganj</option>
                                        <option>Raddi Chowk</option>
                                        <option>Raksa</option>
                                        <option>Rampur</option>
                                        <option>Ranital</option>
                                        <option>Ranjhi</option>
                                        <option>Richai</option>
                                        <option>Rimjha</option>
                                        <option>Russle Chowk</option>
                                        <option>Sadar</option>
                                        <option>Sanjeevani Nagar</option>
                                        <option>sarafa</option>
                                        <option>Jabalpur Station Road</option>
                                        <option>Suhagi</option>
                                        <option>Tayebali chowk</option>
                                        <option>Tilahri</option>
                                        <option>Tewar</option>
                                        <option>Tilwara</option>
                                        <option>Umria</option>
                                        <option>Ukhri</option>
                                        <option>RDVV University Colony</option>
                                        <option>Vijay Nagar</option>
                                        <option>Wright town</option>
                                        <option>Yadav Colony</option>
                                    </select>
                                    <select class="search-fields" name="neighbourhood" id="indore_s" style="display: none">
                                            <option>Nipania</option>
                                            <option>Vijay Nagar</option>
                                            <option>Mahalaxmi Nagar</option>
                                            <option>Bicholi Mardana</option>
                                            <option>Bengali Square</option>
                                            <option>Scheme No. 54</option>
                                            <option>Saket Nagar</option>
                                            <option>Sukhalia</option>
                                            <option>Super Corridor</option>
                                            <option>Scheme No. 78</option>
                                            <option>AB Roadl</option>
                                            <option>Rau</option>
                                            <option>Dewas Naka</option> 
                                            <option>Bakhtawar Ram Nagar</option>
                                            <option>Sudama Nagar</option>
                                            <option>Manorama Ganj</option>
                                            <option>Tulsi Nagar</option>
                                            <option>Old Palasia</option>
                                            <option>Sai Kripa Colony</option>
                                            <option>Navlakha</option>
                                            <option>Khandwa Road</option>
                                            <option>Kanadia Rd</option>
                                            <option>Vandana Nagar</option>
                                            <option>Piplya Kumar</option>
                                            <option>Limbodi</option>
                                            <option>New Palasia</option>
                                            <option>Mhow</option>
                                            <option>Bypass Road</option>
                                            <option>Rajendra Nagar Colony</option>
                                            <option>Scheme No. 7</option>
                                            <option>Tilak Nagar</option>
                                            <option>Race Course Road</option>
                                            <option>Alok Nagar</option> 
                                            <option>Manavta Nagar</option>
                                            <option>Annapurna</option>
                                            <option>Talawali chanda</option>
                                            <option>Shreeji Valley Rd</option>
                                            <option>Scheme No. 140</option>
                                            <option>Shiv Dham Colony</option>
                                            <option>Pipaliyahana</option>
                                            <option>Usha Nagar</option>
                                            <option>Ujjain Road</option>
                                            <option>Khajrana</option>
                                            <option>Sheshadri Colony</option>
                                            <option>Suryadev Nagar</option>
                                            <option>Manishpuri</option>
                                            <option>Manu Shree Nagar</option>
                                            <option>Palakheri</option>
                                            <option>Bada Bangarda</option>
                                            <option>Jhalaria</option>
                                            <option>Maya Khedj</option>
                                            <option>Scheme No.114k</option>
                                            <option>Airport Road</option>
                                            <option>Manglaya Sadak</option>
                                            <option>Choithram</option>
                                            <option>Mundla Nayta</option>
                                            <option>Bijalpur</option>
                                            <option>Devas Road</option>
                                            <option>Vidur Nagar</option>
                                            <option>Devgurdiya</option>
                                            <option>Scheme No. 134</option>
                                            <option>Hatod</option>
                                            <option>Mr-10</option>
                                            <option>Manglia</option>
                                            <option>Rani Bhagh</option>
                                            <option>Palda</option>
                                            <option>Sanwer</option>
                                            <option>Datoda Road</option>
                                            <option>Chhota Bangarda</option>
                                            <option>Niranjanpur</option>
                                            <option>M G Road</option>
                                        
                                        </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="range-slider">
                                    <label>Price</label></br>
                                    <div data-min="0" data-max="150000" data-unit="INR" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <button class="search-button" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Search Section end -->

<!-- Featured Properties start -->
<div class="featured-properties content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Featured Properties</h1>
            <p>Find your properties in your city</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @foreach($properties as $property)
                    <div class="slick-slide-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="{{url('/property_detail/'.$property->id)}}" class="property-img">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-box"><span>Rs {{$property->price}}</span> Per month</div>
                                    @foreach(json_decode($property->gallery) as $img)
                                        <img class="d-block w-100" src="{{url('public/uploads/'.$img)}}" alt="properties">
                                        @break
                                    @endforeach
                                </a>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a href="{{url('/property_detail/'.$property->id)}}">{{$property->property_title}}</a>
                                </h1>

                                <div class="location">
                                    <a href="{{url('/property_detail/'.$property->id)}}">
                                        <i class="flaticon-pin"></i>{{json_decode($property->location)->address}} 
                                        {{json_decode($property->location)->city}}
                                        {{json_decode($property->location)->postal_code}},
                                    </a>
                                </div>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <span>Area</span>{{$property->area}} Sqft
                                </li>
                                <li>
                                    <span>Beds</span> {{$property->bedrooms}}
                                </li>
                                <li>
                                    <span>Baths</span> {{$property->bathroom}}
                                </li>
                                <li>
                                    <span>Halls</span> {{$property->rooms}}
                                </li>
                            </ul>
                            <div class="footer">
                                <a href="#">
                                    <i class="flaticon-people"></i> {{json_decode($property->contact_detail)->name}}
                                </a>
                                <span>
                                    <i class="flaticon-calendar"></i>{{\Carbon \Carbon::now()->diffInDays($property->created_at)}} Days ago
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
<!-- Featured Properties end -->

<!-- Services start -->
<div class="services content-area bg-grea-3">
    <div class="container">
        <div class="main-title text-center">
            <h1>Working with the Reality</h1>
            <p>Saving afford and money since 2019</p>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="service-info">
                    <div class="icon">
                        <i class="flaticon-user"></i>
                    </div>
                    <h3>Legal Protection</h3>
                    <p>Assistance in creating rental agreement & paper work</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="service-info">
                    <div class="icon">
                        <i class="flaticon-apartment-1"></i>
                    </div>
                    <h3>Property Management</h3>
                    <p>Living Far From your Property, Don't worry We are here for manage your Property</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="service-info">
                    <div class="icon">
                        <i class="flaticon-discount"></i>
                    </div>
                    <h3>Transparent Pricing</h3>
                    <p>Owners Price and without Brokerage, What you want More</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services end -->

<!-- Categories strat -->
<div class="categories content-area-7">
    <div class="container">
        <!-- Main title -->
        <div class="main-title text-center">
            <h1>Most Trending Search</h1>
            <p>Find Your Properties In Your City</p>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-pad">
                <div class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="{{url('property/HouseorVilla')}}">HouseorVilla</a>
                                </h3>
                                <h4 class="category-subtitle">{{$housevillpro}} Properties</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-1-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="{{url('property/office_space')}}">Office Space</a>
                                        </h3>
                                        <h4 class="category-subtitle">{{$office_spacepro}} Properties</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-2-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="{{url('property/couple_friendly')}}"> &nbsp&nbsp Couple Friendly</a>
                                        </h3>
                                        <h4 class="category-subtitle">{{$couple_friendlypro}} Properties</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-3-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="{{url('property/shops')}}">  Shops</a>
                                        </h3>
                                        <h4 class="category-subtitle">{{$shopspro}} Properties</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-5-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="{{url('property/flat')}}"> Flat</a>
                                        </h3>
                                        <h4 class="category-subtitle">{{$flatpro}} Properties</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Categories end -->
<div class="our-team content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Testimonials</h1>
            <p>We have professional Customers</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/1.jpeg" alt="1" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a>Abhishek</a>
                                </h4>
                                <h5>Tenant</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <a>"This is second time I am using the services of Rentobro and on both occasions my Relationship Manager was Neelima.She is very professional in his approach and was very fast in finalizing my rental requirement."</a>
                                        </li>
                                    </ul>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/2.jpeg" alt="2" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a>C.P. Prajapati </a>
                                </h4>
                                <h5>Tenant</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <a>"Truly great service and friendly, regular follow ups on the status. Overall had a great experience."</a>
                                        </li>
                                    </ul>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/3.jpeg" alt="2" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a>Shubham Dubey</a>
                                </h4>
                                <h5>Tenant</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <a>"Efficient and punctual....
                                                I am delighted with the help and coordination provided by Executive Mr. Shivam of Rentobro team..."</a>
                                        </li>
                                    </ul>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/4.jpeg" alt="4" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a>Saurabh Khare</a>
                                </h4>
                                <h5>Tenant</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <a>"Quick and efficient response and service lots of time effort and energy saved besides money!
                                                Makes renting a very comfortable task!
                                                Good job Rentobro team!"</a>
                                        </li>
                                    </ul>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/5.jpeg" alt="5" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a>Manoj Jain</a>
                                </h4>
                                <h5>Owner</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <a>"Excellent service. I got tenant for my apartment within 24 hours of my listing.
                                                They got the rent agreement also done and sent to my address at a very nominal cost..
                                                I didn't have to even step out of my home.
                                                Highly recommended."</a>
                                        </li>
                                    </ul>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/6.jpeg" alt="6" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a>Sanjay Samdraia</a>
                                </h4>
                                <h5>Owner</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <a>"Excellent service. I got tenant for my apartment within 24 hours of my listing.
                                                They got the rent agreement also done and sent to my address at a very nominal cost..
                                                I didn't have to even step out of my home.
                                                Highly recommended."</a>
                                        </li>
                                    </ul>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/7.jpeg" alt="7" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a>Rajesh Dubey</a>
                                </h4>
                                <h5>Owner</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <a>"Very convenient ....great response.....Best service....what else one can expect. Very grateful to get tenant without much trouble...with in short time."</a>
                                        </li>
                                    </ul>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="row team-2">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad">
                            <div class="photo">
                                <img src="img/avatar/8.jpeg" alt="8" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad bg align-self-center">
                            <div class="detail">
                                <h4>
                                    <a>Vijay Agrawal</a>
                                </h4>
                                <h5>Owner</h5>
                                <div class="contact">
                                    <ul>
                                        <li>
                                            <a>"Truly customer centered and friendly service. Liked regular follow ups from help desk, overall I had a great experience."</a>
                                        </li>
                                    </ul>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>

<!-- Our team end -->

<!-- Blog start -->
<div class="blog content-area-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Blog</h1>
            <p>Check out some recent news posts.</p>
        </div>
        <!-- Slick slider area start -->
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @foreach($blogs as $blog)
                    <div class="slick-slide-item">
                        <div class="blog-3">
                            <div class="blog-photo">
                                <img src="{{url('public/uploads/'.$blog->image)}}" alt="blog" style="height: 280px; width: 350px" class="img-fluid">
                                <div class="date-box">
                                    <span>{{$blog->created_at->format('d')}}</span>{{$blog->created_at->format('m')}}
                                </div>
                            </div>
                            <div class="detail">
                                <h3>
                                    <a href="{{url('blog_detail/'.$blog->id)}}">{{$blog->title}}</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="flaticon-people"></i>Rentobro</a></span>
                                </div>
                                <p>{{Str::limit($blog->description, 120)}}</p> 
                                <a href="{{url('blog_detail/'.$blog->id)}}" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
<!-- Blog end -->
<script>
    function city_select(){
        
        var city_name= $("#city_name").val();
        // alert(city_name);
        if(city_name == 'Jabalpur'){
            $("#jabalpur").css('display','block');
            $("#jabalpur_s").css('display','block');
            $("#indore").css('display','none');
            $("#indore_s").css('display','none');
        }
        else{
            $("#indore").css('display','block');
            $("#indore_s").css('display','block');
            $("#jabalpur").css('display','none');
            $("#jabalpur_s").css('display','none');
        }
    }
    
    function mob_city_select(){
        var city_name= $("#hcity_name").val();
        if(city_name == 'Jabalpur'){
            $("#indore").css('display','none');
            $("#indore_s").css('display','none');
            $("#jabalpur").css('display','block');
            $("#jabalpur_s").css('display','block');
            
        }
        else{
            $("#jabalpur").css('display','none');
            $("#jabalpur_s").css('display','none');
            $("#indore").css('display','block');
            $("#indore_s").css('display','block');
            
        }
        
    }
</script>
@endsection()

