@extends('layouts.about')
@section('content')
<div class="sub-banner overview-bgi" style="background: rgba(0, 0, 0, 0.04) url(../img/banner/banner-3.jpg) top left repeat; background-size:cover; background-position:center; background-repeat:no-repeat ">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Properties</h1>
            <ul class="breadcrumbs">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Properties</li>
            </ul>
        </div>
    </div>
</div>
<!-- Properties section body start -->
<div class="properties-section-body content-area">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                    <div class="row">
                        <div class="col-lg-6 col-md-7 col-sm-7">
                            <div class="sorting-options2">
                                <span class="sort">Sort by:</span>
                                <select class="selectpicker search-fields" name="property_type">
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
                        <div class="col-lg-6 col-md-5 col-sm-5">
                            <div class="sorting-options">
                                <a href="#" class="change-view-btn"><i class="fa fa-th-list"></i></a>
                                <a href="#" class="change-view-btn active-view-btn"><i class="fa fa-th-large"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                @if(count($properties)<= 0 )
                <h5>Sorry No such Property found</h5>
                @else
                    @foreach($properties as $property)
                    <div class="col-lg-6 col-md-6 col-sm-12" >
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <a href="{{url('/property_detail/'.$property->id)}}" class="property-img">
                                    <div class="listing-badges">
                                        <!--<span class="featured">Featured</span>-->
                                    </div>
                                    <div class="price-box"><span>Rs {{$property->price}}</span> Per month</div>
                                    @foreach(json_decode($property->gallery) as $img)
                                        <img src="{{url('public/uploads/'.$img)}}" alt="listing-photo" class="img-fluid">
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
                                        <i class="flaticon-pin"></i>
                                        {{json_decode($property->location)->address}}
                                        {{json_decode($property->location)->city}}
                                        {{json_decode($property->location)->postal_code}}, 
                                    </a>
                                </div>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <span>Area</span>{{$property->area}}
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
                @endif
                </div>
                {{$properties->links()}}
                <!-- Page navigation start -->
                <!--<div class="pagination-box hidden-mb-45 text-center">-->
                <!--    <nav aria-label="Page navigation example">-->
                <!--        <ul class="pagination">-->
                <!--            <li class="page-item">-->
                <!--                <a class="page-link" href="#">Prev</a>-->
                <!--            </li>-->
                <!--            <li class="page-item"><a class="page-link active" href="properties-grid-rightside.html">1</a></li>-->
                <!--            <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                <!--            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                <!--            <li class="page-item">-->
                <!--                <a class="page-link" href="properties-list-rightside.html">Next</a>-->
                <!--            </li>-->
                <!--        </ul>-->
                <!--    </nav>-->
                <!--</div>-->
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
                             <input type="text" id="area" name="area" value="0" placeholder="Area">
                            <div class="clearfix"></div>
                        </div>
                        <div class="range-slider">
                            <label>Minimum Price(INR)</label>
                            <input type="range" min="0" max="150000"  data-min-name="min_price"
                             data-max-name="max_price" data-unit="INR"  
                             class="range-slider-ui ui-slider" aria-disabled="false" onchange="updateprice(this.value);">
                             <input type="text" id="price" name="price" value="0" placeholder="Minimum Price">
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
                                    @foreach(json_decode($rec_property->gallery) as $img)
                                        <img src="{{url('public/uploads/'.$img)}}" alt="listing-photo" class="img-fluid">
                                        @break
                                    @endforeach
                                </a>
                                <div class="media-body align-self-center">
                                    <h5>
                                        <a href="{{url('/property_detail/'.$rec_property->id)}}">{{$rec_property->property_title}}</a>
                                    </h5>
                                    <div class="listing-post-meta">
                                        ${{$rec_property->price}} | <a href="#"><i class="fa fa-calendar"></i> {{$rec_property->created_at->format('M, d Y')}} </a>
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
                            <li><a href="#">Agriculture Land <span>(21)</span> </a></li>
                            <li><a href="#">House/Villa<span>(23)</span></a></li>
                            <li><a href="#">Flat <span>(19)</span></a></li>
                            <li><a href="#">Office Space <span>(19)</span></a> </li>
                            <li><a href="#">Shop/Showroom <span>(22) </span></a></li>
                        </ul>
                    </div>
                  Our agent sidebar start -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Properties section body end -->
<script>
        function updateTextInput(val) {
          document.getElementById('area').value=val; 
        }

        function updateprice(val) {
          document.getElementById('price').value=val; 
        }
</script>
@endsection