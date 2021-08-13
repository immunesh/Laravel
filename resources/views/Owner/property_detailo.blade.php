@extends('layouts.about')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner overview-bgi" style="background: rgba(0, 0, 0, 0.04) url(../img/banner/banner-3.jpg) top left repeat; background-size:cover; background-position:center; background-repeat:no-repeat ">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Property Detail</h1>
            <ul class="breadcrumbs">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Property Detail</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->
<!-- Properties details page start -->
<div class="properties-details-page content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Heading properties 3 start -->
                <div class="heading-properties-3">
                    <h1>{{$property->property_title}}</h1>
                    <div class="mb-30"><span class="property-price">Rs {{$property->price}}</span> 
                    <span class="rent">{{$property->status}}</span> 
                    <span class="location"><i class="flaticon-pin"></i>{{json_decode($property->location)->address}}
                     {{json_decode($property->location)->city}}
                    {{json_decode($property->location)->postal_code}}, </span></div>
                </div>
            </div>
        </div>
        <div class="row">  
            <div class="col-lg-8 col-md-12">
                <!-- main slider carousel items -->
                <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                    <div class="carousel-inner">
                        @foreach($gallery as $image)
                        <div class="{{($loop->index == '0')?'active':''}} item carousel-item" data-slide-number="{{$loop->index}}">
                            <img src="{{url('public/uploads/'.$image)}}" class="img-fluid" alt="slider-properties" style="width:100%; height: 480px">
                        </div>
                        @endforeach

                        <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                        @foreach($gallery as $images)
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="{{($loop->index == '0')?'selected':''}}" data-slide-to="{{$loop->index}}" data-target="#propertiesDetailsSlider">
                                <img src="{{url('public/uploads/'.$images)}}" class="img-fluid" alt="properties-small" style="width:100%">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <!-- main slider carousel items -->
                </div>
                <!---Updated Code Start-->
                <div class="col-lg-12 mb-40">
                    <div class="button-section">
                        @if(Auth::check())
                            @if(Auth::user()->subscribed_plan_id != 0)
                                <button type="button" class="btn btn-success btn-lg" onclick="contact_owner({{$property->id}})">Owner</button>
                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal2">Visit</button>
                            @else
                                <button type="button" class="btn btn-success btn-lg" onclick="alert('You are not subscribed any plan! Please go to Package page and Subscribe')">Contact Owner</button>
                                <button type="button" class="btn btn-success btn-lg" onclick="alert('You are not subscribed any plan! Please go to Package page and Subscribe')">Schedule Appointment</button>
                            @endif
                            <a href="#" class="btn btn-success btn-lg">Booking</a>
                            
                        @else
                            <a href="{{url('login')}}" class="btn btn-success btn-lg">Owner</a>
                            <a href="{{url('login')}}" class="btn btn-success btn-lg">Visit</a>
                            <a href="{{url('login')}}" class="btn btn-success btn-lg">Booking</a>
                        @endif
                    </div>
                </div>
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Owner Contact Form</h4>
                            </div>
                            <div class="modal-body">
                                <!-- -Here check will be apply like   without login messege =   -->
                                <!-- @if(!Auth::check())
                                <p>Please Login Here-<a class="btn btn-theme btn-md" href="{{url('login')}}">Login</a> .</p>  -->
                                <!-- when tenant logged in it will show,  -->
                                <!-- @else -->
                                <h5><a href="agent-detail.html" id="co_name"></a></h5>
                                <h4 id="co_phone"></h4> 
                                <p id="co_msg" style="color: red"></p>
                                <!-- @endif -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Schedule Visit</h4>
                            </div>
                            <div class="modal-body" id="appoint">
                                <!-- When tenant is not login modal will show=   -->
                                <!-- @if(!Auth::check())
                                    <p>Please Login Here-<a class="btn btn-theme btn-md" href="login.html">Login</a> .</p> -->
                                    <!-- but when loggedin he/she will select date and time = -->
                                <!-- @else -->
                                    <label for="meeting-time" id="a_label">Choose a time for your appointment:</label>

                                    <input type="datetime-local" id="meetingtime"
                                        name="meetingtime" value="{{\Carbon \Carbon::now()}}"
                                        >
                                    <!-- <p>Please Submit - .</p> -->
                                    <a class="btn btn-theme btn-sm" href="#" id="appointSubmit" onclick="appointment({{$property->id}})">Submit</a>
                                    <p id="appoint_msg" style="color: red"></p>
                                <!-- @endif -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!---Updated Code End-->
              
                <!-- Properties description start -->
                <div class="properties-description mb-40">
                    <h3 class="heading-2">
                        Description
                    </h3>
                    <p>{{$property->description}}</p>
                </div>
                <!-- Properties amenities start -->
                <div class="properties-amenities mb-40">
                    <h3 class="heading-2">
                        Features
                    </h3>
                    <div class="row">
                        @foreach(explode(',', $property->features) as $feature)
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <ul class="amenities">
                                <li>
                                    <i class="fa fa-check"></i>{{$feature}}
                                </li>
                            </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Floor plans start -->
                <div class="floor-plans mb-50">
                    <h3 class="heading-2">Floor Plans</h3>
                    <table>
                        <tbody><tr>
                            <td><strong>Size</strong></td>
                            <td><strong>Halls</strong></td>
                            <td><strong>Bathrooms</strong></td>
                            <td><strong>Bedrooms</strong></td>
                        </tr>
                        <tr>
                            <td>{{$property->area}}</td>
                            <td>{{$property->rooms}}</td>
                            <td>{{$property->bathroom}}</td>
                            <td>{{$property->bedrooms}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Location start -->
                <!-- <div class="location mb-50">
                    <div class="map">
                        <h3 class="heading-2">Property Location</h3>
                        <div id="map" class="contact-map"></div>
                    </div>
                </div>     -->
                <!-- Inside properties start -->
                <!--<div class="inside-properties mb-50">-->
                <!--    <h3 class="heading-2">-->
                <!--        Property Video-->
                <!--    </h3>-->
                <!--    <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>-->
                <!--</div>-->
                <!-- <h3 class="heading-2">Similar Properties</h3>
                <div class="row similar-properties">
                    @foreach($sim_properties as $sim_property)
                        <div class="col-md-6">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <a href="{{url('/property_detail/'.$sim_property->id)}}" class="property-img">
                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                        </div>
                                        <div class="price-box"><span>${{$sim_property->price}}</span> Per Month</div>
                                        <img class="d-block w-100" src="{{url('img/properties/properties-5.jpg')}}" alt="properties">
                                    </a>
                                </div>
                                <div class="detail">
                                    <h1 class="title">
                                        <a href="{{url('/property_detail/'.$sim_property->id)}}">{{$sim_property->property_title}}</a>
                                    </h1>

                                    <div class="location">
                                        <a href="{{url('/property_detail/'.$sim_property->id)}}">
                                            <i class="flaticon-pin"></i>{{json_decode($property->location)->address}} 
                                                {{json_decode($property->location)->neighbourhood}} {{json_decode($property->location)->state}}
                                                {{json_decode($property->location)->postal_code}},
                                        </a>
                                    </div>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <span>Area</span>{{$sim_property->area}} Sqft
                                    </li>
                                    <li>
                                        <span>Beds</span> {{$sim_property->bedrooms}}
                                    </li>
                                    <li>
                                        <span>Baths</span> {{$sim_property->bathroom}}
                                    </li>
                                    <li>
                                        <span>Rooms</span> {{$sim_property->rooms}}
                                    </li>
                                </ul>
                                <div class="footer">
                                    <a href="#">
                                        <i class="flaticon-people"></i> {{json_decode($sim_property->contact_detail)->name}}
                                    </a>
                                    <span>
                                    <i class="flaticon-calendar"></i>{{\Carbon \Carbon::now()->diffInDays($sim_property->created_at)}}
                                </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> -->
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <div class="widget advanced-search">
                        <h3 class="sidebar-title">Advanced Search</h3>
                        <div class="s-border"></div>
                        <form method="POST" action="{{url('properties')}}">
                        @csrf
                           <div class="form-group">
                                <label>Status</label>
                                <select class="selectpicker search-fields" name="status">
                                    
                                      <option>For Sale</option>
                                    <option>For Rent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type</label></br>
                                <select class="search-fields" name="property_type">
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
                            <div class="form-group">
                                <label>City</label>
                                <select class="selectpicker search-fields" name="location" id="city_name" onchange="city_select()">
                                    <option>Jabalpur</option>
                                    <option>Indore</option>
                                </select>
                            </div>
                        <div class="form-group">
                            <label>Neighbourhood</label>
                            <select class="search-fields form-control" name="neighbourhood" id="jabalpur">
                                <option>Adarsh nagar</option>
                                <option>Sadar</option>
                                <option>Katanga</option>
                                <option>Garakhpur</option>
                                <option>Bus Stand</option>
                                <option>Civil Line</option>
                                <option>Others</option>
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
                            <select class="search-fields form-control" name="neighbourhood" id="indore" style="display: none">
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
                    
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
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
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="bathroom">
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
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="rental_floor">
                                        <option>Balcony</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>more than 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="room">
                                        <option>Halls</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>more than 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="range-slider">
                            <label>Area(sqft)</label>
                            <input type="range" min="0" max="10000" data-min-name="min_area" data-max-name="max_area"
                             data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"
                             onchange="updateTextInput(this.value);">
                             <input type="text" id="area" name="area" value="" placeholder="Area">
                            <div class="clearfix"></div>
                        </div>
                        <div class="range-slider">
                            <label>Minimum Price(INR)</label>
                            <input type="range" min="0" max="150000"  data-min-name="min_price"
                             data-max-name="max_price" data-unit="INR"  
                             class="range-slider-ui ui-slider" aria-disabled="false" onchange="updateprice(this.value);">
                             <input type="text" id="price" name="price" value="" placeholder="Minimum Price">
                            <div class="clearfix"></div>
                        </div>
                            <!-- <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
                                <i class="fa fa-plus-circle"></i> Other Features
                            </a> -->
                            <!-- <div id="options-content" class="collapse">
                                <h3 class="sidebar-title">Features</h3>
                                <div class="s-border"></div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox2" type="checkbox" name="AC">
                                    <label for="checkbox2">
                                        Air Condition
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox3" type="checkbox" name="seat">
                                    <label for="checkbox3">
                                        Places to seat
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox4" type="checkbox" name="Swimming">
                                    <label for="checkbox4">
                                        Swimming Pool
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox1" type="checkbox" name="Parking">
                                    <label for="checkbox1">
                                        Free Parking
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox7" type="checkbox" name="Heating">
                                    <label for="checkbox7">
                                        Central Heating
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox5" type="checkbox" name="Laundry">
                                    <label for="checkbox5">
                                        Laundry Room
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox6" type="checkbox" name="WindowCovering">
                                    <label for="checkbox6">
                                        Window Covering
                                    </label>
                                </div>
                                <div class="checkbox checkbox-theme checkbox-circle">
                                    <input id="checkbox8" type="checkbox" name="Alarm">
                                    <label for="checkbox8">
                                        Alarm
                                    </label>
                                </div>
                                <br>
                            </div> -->
                            <div class="form-group mb-0">
                                <button type="submit" class="search-button">Search</button>
                            </div>
                        </form>
                    </div>
                    <!-- Recent properties start -->
                    <div class="widget recent-properties">
                        <h3 class="sidebar-title">Recent Properties</h3>
                        <div class="s-border"></div>
                        @foreach($rec_properties as $rec_property)
                            <div class="media mb-4">
                                <a class="pr-3" href="{{url('/property_detail/'.$rec_property->id)}}">
                                    <img class="media-object" src="{{url('img/properties/small-properties-1.jpg')}}" alt="small-properties">
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href="{{url('/property_detail/'.$rec_property->id)}}">{{$rec_property->property_title}}</a>
                                    </h5>
                                    <div class="listing-post-meta">
                                        {{$rec_property->price}} | <a href="#"><i class="fa fa-calendar"></i>
                                         {{$rec_property->created_at->format('M, d Y')}} </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Posts by category Start 
                    <div class="posts-by-category widget">
                        <h3 class="sidebar-title">Category</h3>
                        <div class="s-border"></div>
                        <ul class="list-unstyled list-cat">
                            <li><a href="#">Couple Friendly <span>(45)</span></a></li>
                            <li><a href="#">Apartment <span>(21)</span> </a></li>
                            <li><a href="#">House/Villa<span>(23)</span></a></li>
                            <li><a href="#">Flat <span>(19)</span></a></li>
                            <li><a href="#">Office Space <span>(19)</span></a> </li>
                            <li><a href="#">Shop/Showroom <span>(22) </span></a></li>
                        </ul>
                    </div>
               </div>    -->
        </div>
        </div>
            <!-- Similar Properties start -->
            <div class="featured-properties">
                <div class="container">
                    <!-- Main title -->
                    <h3 class="heading-2">Similar Properties</h3>
                    <!-- Slick slider area start -->
                    @if(count($sim_properties)> 0)
                    <div class="slick-slider-area">
                        <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                            @foreach($sim_properties as $sim_property)
                                <div class="slick-slide-item">
                                    <div class="property-box">
                                        <div class="property-thumbnail">
                                            <a href="{{url('/property_detail/'.$sim_property->id)}}" class="property-img">
                                                <div class="listing-badges">
                                                    <span class="featured">Featured</span>
                                                </div>
                                                <div class="price-box"><span>{{$sim_property->price}}</span> Per Month</div>
                                                <img class="d-block w-100" src="{{url('img/properties/properties-5.jpg')}}" alt="properties">
                                            </a>
                                        </div>
                                        <div class="detail">
                                            <h1 class="title">
                                                <a href="{{url('/property_detail/'.$sim_property->id)}}">{{$sim_property->property_title}}</a>
                                            </h1>
        
                                            <div class="location">
                                                <a href="{{url('/property_detail/'.$sim_property->id)}}">
                                                    <i class="flaticon-pin"></i>{{json_decode($property->location)->address}} 
                                                        {{json_decode($property->location)->neighbourhood}} {{json_decode($property->location)->state}}
                                                        {{json_decode($property->location)->postal_code}},
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="facilities-list clearfix">
                                            <li>
                                                <span>Area</span>{{$sim_property->area}} Sqft
                                            </li>
                                            <li>
                                                <span>Beds</span> {{$sim_property->bedrooms}}
                                            </li>
                                            <li>
                                                <span>Baths</span> {{$sim_property->bathroom}}
                                            </li>
                                            <li>
                                                <span>Rooms</span> {{$sim_property->rooms}}
                                            </li>
                                        </ul>
                                        <div class="footer">
                                            <a href="#">
                                                <i class="flaticon-people"></i> {{json_decode($sim_property->contact_detail)->name}}
                                            </a>
                                            <span>
                                            <i class="flaticon-calendar"></i>{{\Carbon \Carbon::now()->diffInDays($sim_property->created_at)}}
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
                    @else
                        <p>No Similar Property Found</p>
                    @endif
                </div>
            </div>
        
    </div>
</div>
<!-- Properties details page end -->
<script>
function contact_owner(id){
    console.log("ok");
    $.ajax({
            url: '/contactOwner/'+id,
            method: 'get',
            data: { _token: "{{csrf_token()}}"},
            success: function(res){
                if(res.co_status == 'planExpired'){
                    $("#co_msg").text('Sorry! Property Owner Plan Expired');
                    $("#myModal1").modal('show');
                }
                else if(res.co_status == 'success'){
                    $("#co_name").text('{{json_decode($property->contact_detail)->name}}');
                    $("#co_phone").text('{{json_decode($property->contact_detail)->phone}}');
                    $("#myModal1").modal('show');
                }
                else{
                    $("#co_msg").text('Your plan is totally used for contact Owner please go to package and subscribe Higher Plan');
                    $("#myModal1").modal('show');
                }
                console.log(res.co_status);
            }     
          });
}
</script>
<script>
function appointment(id){
    var meetingtime= $("#meetingtime").val();
    console.log(meetingtime);
    $.ajax({
            url: '/appointment/'+id,
            method: 'get',
            data: { meetingtime: meetingtime, _token: "{{csrf_token()}}"},
            success: function(res){
                $("#meetingtime").css('display','none');
                $("#appointSubmit").css('display','none');
                $("#a_label").css('display','none');
                if(res.appoint_status == 'planExpired'){
                    $("#appoint_msg").text('Sorry! Owner Plan Expired');
                }
                else if(res.appoint_status == 'subscribed'){
                    $("#appoint_msg").text('You Already fix time for this plan');
                }
                else if(res.appoint_status == 'success'){
                    $("#appoint_msg").css('color','green');
                    $("#appoint_msg").text('Appointment Fixed');
                }
                else{
                    $("#appoint_msg").text('Your plan is totally used for Appointment please go to package and subscribe Higher Plan');
                }
                
            }     
          });
}
</script>
<script>
        function updateTextInput(val) {
          document.getElementById('area').value=val; 
        }

        function updateprice(val) {
          document.getElementById('price').value=val; 
        }
</script>
<script>
    function city_select(){
        
        var city_name= $("#city_name").val();
        if(city_name == 'Jabalpur'){
            $("#jabalpur").css('display','block');
            
            $("#indore").css('display','none');
           
        }
        else{
            $("#indore").css('display','block');
            
            $("#jabalpur").css('display','none');
            
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

@endsection