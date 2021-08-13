@extends('layouts.dashboardL')
@section('content')
<!-- Dashboard start -->
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Submit Property</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('owner/dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Submit Property</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{url('update_property/'.$property->id)}}" enctype="multipart/form-data">
                            @csrf
                            <h4 class="bg-grea-3">Basic Information</h4>
                            <div class="search-contents-sidebar">
                                <div class="row pad-20">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Property Title</label>
                                            <input type="text" class="input-text" value="{{$property->property_title}}" name="property_title" placeholder="Property Title" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="selectpicker search-fields" name="status" required>
                                                <option {{($property->property_title == 'For Sale')?'selected':''}}>For Sale</option>
                                                <option {{($property->property_title == 'For Rent')?'selected':''}}>For Rent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="input-text" value="{{$property->price}}" name="price" placeholder="INR" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Area/Size</label>
                                            <input type="text" class="input-text" value="{{$property->area}}" name="area" placeholder="SqFt" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Deposit Cost</label>
                                            <input type="text" class="input-text" value="{{$property->dpst_cost}}" name="dpst_cost" placeholder="INR" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Maintenance Cost</label>
                                            <input type="text" class="input-text" value="{{$property->mtnc_cost}}" name="mtnc_cost" placeholder="INR" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Type</label></br>
                                            <select class="search-fields" name="choose-type">
                                                <option>All Type</option>
                                                <option>House/Villa</option>
                                                <option>Couple Friendly</option>
                                                <option>Agriculture Land</option>
                                                <option>Farmhouse</option>
                                                <option>Flat</option>
                                                <option>Office Space</option>
                                                <option>Shops</option>
                                                <option>Warehouse/Godown</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Hall</label>
                                            <select class="selectpicker search-fields" name="rooms" required>
                                                <option {{($property->rooms == 0)?'selected':''}}>0</option>
                                                <option {{($property->rooms == 1)?'selected':''}}>1</option>
                                                <option {{($property->rooms == 2)?'selected':''}}>2</option>
                                                <option {{($property->rooms == 3)?'selected':''}}>3</option>
                                                <option {{($property->rooms == 4)?'selected':''}}>4</option>
                                                <option {{($property->rooms == 5)?'selected':''}}>5</option>
                                                <option>more than 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Bedrooms</label>
                                            <select class="selectpicker search-fields" name="bedrooms" required>
                                                <option {{($property->bedrooms == 0)?'selected':''}}>0</option>
                                                <option {{($property->bedrooms == 1)?'selected':''}}>1</option>
                                                <option {{($property->bedrooms == 2)?'selected':''}}>2</option>
                                                <option {{($property->bedrooms == 3)?'selected':''}}>3</option>
                                                <option {{($property->bedrooms == 4)?'selected':''}}>4</option>
                                                <option {{($property->bedrooms == 5)?'selected':''}}>5</option>
                                                <option>more than 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Bathroom</label>
                                            <select class="selectpicker search-fields" name="bathroom" required>
                                                <option {{($property->bathroom == 0)?'selected':''}}>0</option>
                                                <option {{($property->bathroom == 1)?'selected':''}}>1</option>
                                                <option {{($property->bathroom == 2)?'selected':''}}>2</option>
                                                <option {{($property->bathroom == 3)?'selected':''}}>3</option>
                                                <option {{($property->bathroom == 4)?'selected':''}}>4</option>
                                                <option {{($property->bathroom == 5)?'selected':''}}>5</option>
                                                <option {{($property->bathroom == 'more than 5')?'selected':''}}>more than 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Rental Floor</label>
                                            <select class="selectpicker search-fields" name="rental_floor">
                                                <option {{($property->rental_floor == 1)?'selected':''}}>1</option>
                                                <option {{($property->rental_floor == 2)?'selected':''}}>2</option>
                                                <option {{($property->rental_floor == 3)?'selected':''}}>3</option>
                                                <option {{($property->rental_floor == 4)?'selected':''}}>4</option>
                                                <option {{($property->rental_floor == 5)?'selected':''}}>5</option>
                                                <option {{($property->rental_floor == 'more than 5')?'selected':''}}>more than 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="bg-grea-3">Location</h4>
                            <div class="row pad-20">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="input-text" value="{{json_decode($property->location)->address}}" name="address"  placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>City</label>
                                        <select class="selectpicker search-fields" name="city" id="city_name" onchange="city_select()" required>
                                            
                                            <option {{(json_decode($property->location)->city == 'Jabalpur')?'selected':''}}>Jabalpur</option>
                                            <option {{(json_decode($property->location)->city ==  'Indore')?'selected':''}}>Indore</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Neighbourhood</label></br>
                                        <select class="search-fields" id="jabalpur" name="neighbourhood" style="display: {{(json_decode($property->location)->city == 'Jabalpur')?'block':'none'}}">
                                            <option value="">Choose Neighbour</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Adrsh nagar')? 'selected':''}}>Adarsh nagar</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Airport Road')? 'selected':''}}>Airport Road</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Gorakpur')? 'selected':''}}>Gorakpur</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Adhartal')? 'selected':''}}>Adhartal</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Amkhera')? 'selected':''}}>Amkhera</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Gorakhpur')? 'selected':''}}>Gorakhpur</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Bahora bagh')? 'selected':''}}>Bahora bagh</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Baldev bagh')? 'selected':''}}>Baldev bagh</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Bargi Hills')? 'selected':''}}>Bargi Hills</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Bihai')? 'selected':''}}>Bihari </option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Bhedaghat road')? 'selected':''}}>Bhedaghat road</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'GCF')? 'selected':''}}>GCF</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Cantt')? 'selected':''}}>Cantt</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Civil Lines')? 'selected':''}}>Civil Lines</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Dhanwantari Nagar')? 'selected':''}}>Dhanwantari Nagar</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Deendyal Chowk')? 'selected':''}}>Deendyal Chowk</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'DAMOH NAKA')? 'selected':''}}>DAMOH NAKA</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Fuhara')? 'selected':''}}>Fuhara</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Garha')? 'selected':''}}>Garha</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'GwariGhat')? 'selected':''}}>GwariGhat</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Ghamapur')? 'selected':''}}>Ghamapur</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'GhantaGhar')? 'selected':''}}>GhantaGhar</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Gohalpur')? 'selected':''}}>Gohalpur</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Gorakhpur')? 'selected':''}}>Gorakhpur</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Gol Bazar')? 'selected':''}}>Gol Bazar</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Jabalpur Cantonment')? 'selected':''}}>Jabalpur Cantonment</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Hathital')? 'selected':''}}>Hathital</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Katanga')? 'selected':''}}>Katanga</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Karmeta')? 'selected':''}}>Karmeta</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Khamaria')? 'selected':''}}>Khamaria</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Karamchand Chowk')? 'selected':''}}>Karamchand Chowk</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Labour Chowk')? 'selected':''}}>Labour Chowk</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Madan Mahal')? 'selected':''}}>Madan Mahal</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Maharajrajpur')? 'selected':''}}>Maharajrajpur</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Malviya Chowk')? 'selected':''}}>Malviya Chowk</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Medical College')? 'selected':''}}>Medical College</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Milauni Ganj')? 'selected':''}}>Milauni Ganj</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Nagrath Chowk')? 'selected':''}}>Nagrath Chowk</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Napier Town')? 'selected':''}}>Napier Town</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Narmada Nagar')? 'selected':''}}>Narmada Nagar</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Nayagaon')? 'selected':''}}>Nayagaon</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Kanchghar')? 'selected':''}}>Kanchghar</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Niwadganj')? 'selected':''}}>Niwadganj</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Raddi Chowk')? 'selected':''}}>Raddi Chowk</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Raksa')? 'selected':''}}>Raksa</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Rampur')? 'selected':''}}>Rampur</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Ranital')? 'selected':''}}>Ranital</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Ranjhi')? 'selected':''}}>Ranjhi</option>o
                                            <option {{(json_decode($property->location)->neighbourhood == 'Russle Chowk')? 'selected':''}}>Russle Chowk</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Sadar')? 'selected':''}}>Sadar</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Sanjeevani Nagar')? 'selected':''}}>Sanjeevani Nagar</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Sarafa')? 'selected':''}}>Sarafa</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Jabalpur Station Road')? 'selected':''}}>Jabalpur Station Road</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Suhagi')? 'selected':''}}>Suhagi</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Tayebali chowk')? 'selected':''}}>Tayebali chowk</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Tilahri')? 'selected':''}}>Tilahri</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Tewar')? 'selected':''}}>Tewar</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Tilwara')? 'selected':''}}>Tilwara</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Umria')? 'selected':''}}>Umria</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Ukhri')? 'selected':''}}>Ukhri</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'wright town')? 'selected':''}}>Wright town</option>
                                            <option {{(json_decode($property->location)->neighbourhood == 'Yadav Colony')? 'selected':''}}>Yadav Colony</option>
                                        </select>
                                        <select class="search-fields" name="neighbourhoodI" id="indore" style="display: {{(json_decode($property->location)->city == 'Indore')?'block':'none'}}">
                                            <option value="">Choose Neighbour</option>
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
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>State</label>
                                        <select class="selectpicker search-fields" name="state" required>
                                            <option>Choose State</option>
                                            <option {{ old('state') == 'Madhya Pradesh'? 'selected':''}}>Madhya Pradesh</option>
                                            <option {{ old('state') == 'Maharashtra'? 'selected':''}}>Maharashtra</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" class="input-text" value="{{json_decode($property->location)->postal_code}}" name="postal_code"  placeholder="Postal Code">
                                    </div>
                                </div>
                            </div>
                            <h4 class="bg-grea-3">Property Gallery</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <input type="file" id="myDropZone" name="gallery[]" class="dropzone dropzone-design" multiple>
                                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                </div>
                            </div>
                            <!--<h4 class="bg-grea-3">Property Video</h4>-->
                            <!--<div class="row pad-20">-->
                            <!--    <div class="col-lg-12">-->
                            <!--        <input type="file" id="myDropZone" name="property_video" class="dropzone dropzone-design">-->
                            <!--            <div class="dz-default dz-message"><span>Drop Video File here to upload</span></div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <h4 class="bg-grea-3">Detailed Information</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <textarea name="description" class="form-control" placeholder="Detailed Information">{{$property->description}}</textarea>
                                </div>
                            </div>
                            <h4 class="bg-grea-3">Features</h4>
                            <div class="row pad-20">
                                @foreach(explode(',', $property->features) as $feature)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox{{$loop->index}}" type="checkbox" value="Accomodation Type-Dependent" name="feature[]" checked>
                                        <label for="checkbox{{$loop->index}}">
                                            {{$feature}}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox1" type="checkbox" value="Accomodation Type-Dependent" name="feature[]">
                                        <label for="checkbox1">
                                            Dependent
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox2" type="checkbox" value="Independent" name="feature[]">
                                        <label for="checkbox2">
                                            Independent
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox3" type="checkbox" value="Available For Commercial" name="feature[]">
                                        <label for="checkbox3">
                                            Available For Commercial
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox4" type="checkbox" value="Balcony" name="feature[]">
                                        <label for="checkbox4">
                                            Balcony
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox5" type="checkbox" value="Couple Friendly" name="feature[]">
                                        <label for="checkbox5">
                                            Couple Friendly
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox6" type="checkbox" value="AC" name="feature[]">
                                        <label for="checkbox6">
                                            AC
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox7" type="checkbox" value="Bed" name="feature[]">
                                        <label for="checkbox7">
                                            Bed
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox8" type="checkbox" value="Cupboards" name="feature[]">
                                        <label for="checkbox8">
                                            Cupboards
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox9" type="checkbox" value="Fans" name="feature[]">
                                        <label for="checkbox9">
                                            Fans
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox10" type="checkbox" value="Fridge" name="feature[]">
                                        <label for="checkbox10">
                                          Fridge  
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox11" type="checkbox" value="Geyser" name="feature[]">
                                        <label for="checkbox11">
                                            Geyser
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox12" type="checkbox" value="Internet" name="feature[]">
                                        <label for="checkbox12">
                                            Internet
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox13" type="checkbox" value="Microwave" name="feature[]">
                                        <label for="checkbox13" name="Microwave">
                                            Microwave
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox14" type="checkbox" value="Moduler Kitchin" name="feature[]">
                                        <label for="checkbox14">
                                            Moduler Kitchin
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox15" type="checkbox" value="Sofa" name="feature[]">
                                        <label for="checkbox15">
                                            Sofa
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox16" type="checkbox" value="Tubelights" name="feature[]">
                                        <label for="checkbox16">
                                            Tubelights
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox17" type="checkbox" value="TV" name="feature[]">
                                        <label for="checkbox17">
                                            TV
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox18" type="checkbox" value="Washing Machine" name="feature[]">
                                        <label for="checkbox18">
                                            Washing Machine
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox19" type="checkbox" value="Furnished" name="feature[]">
                                        <label for="checkbox19">
                                            Furnished
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox20" type="checkbox" value="Semi-Furnished" name="feature[]">
                                        <label for="checkbox20">
                                            Semi-Furnished
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox21" type="checkbox" value="Unfurnished" name="feature[]">
                                        <label for="checkbox21">
                                            Unfurnished
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox22" type="checkbox" value="Lift" name="feature[]">
                                        <label for="checkbox22">
                                            Lift
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox23" type="checkbox" value="2-Wheeler Parking" name="feature[]">
                                        <label for="checkbox23">
                                            2-Wheeler Parking
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox24" type="checkbox" value="4-Wheeler Parking" name="feature[]">
                                        <label for="checkbox24">
                                            4-Wheeler Parking
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox25" type="checkbox" value="Pets allowed" name="feature[]">
                                        <label for="checkbox25">
                                            Pets allowed
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox26" type="checkbox" value="Male" name="feature[]">
                                        <label for="checkbox26">
                                            Male
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox27" type="checkbox" value="Female" name="feature[]">
                                        <label for="checkbox27">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox28" type="checkbox" value="Family" name="feature[]">
                                        <label for="checkbox28">
                                            Family
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox29" type="checkbox" value="Bachelors" name="feature[]">
                                        <label for="checkbox29">
                                            Bachelors
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox30" type="checkbox" value="Working Profeshionals" name="feature[]">
                                        <label for="checkbox30">
                                            Working Profeshionals
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox31" type="checkbox" value="vegetarian" name="feature[]">
                                        <label for="checkbox31">
                                            vegetarian
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox32" type="checkbox" value="Non vegetarian" name="feature[]">
                                        <label for="checkbox32">
                                            Non vegetarian
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox36" type="checkbox" value="Duplex" name="feature[]">
                                        <label for="checkbox36">
                                            Duplex
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox37" type="checkbox" value="Singlex" name="feature[]">
                                        <label for="checkbox37">
                                           Singlex 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox38" type="checkbox" value="Ground Floor" name="feature[]">
                                        <label for="checkbox38">
                                            Ground Floor
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox39" type="checkbox" value="Property Deposit" name="feature[]">
                                        <label for="checkbox39">
                                            Property Deposit
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox40" type="checkbox" value="Servant Room" name="feature[]">
                                        <label for="checkbox40">
                                            Servant Room
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="checkbox checkbox-theme checkbox-circle">
                                        <input id="checkbox41" type="checkbox" value="Washroom" name="feature[]">
                                        <label for="checkbox41">
                                            Washroom
                                        </label>
                                    </div>
                                </div>
                            </div>    
                            <h4 class="bg-grea-3">Contact Details</h4>
                            <div class="row pad-20">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="input-text" name="name" value="{{json_decode($property->contact_detail)->name}}" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="input-text" name="email" placeholder="Email" value="{{json_decode($property->contact_detail)->email}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="input-text" name="phone"  placeholder="Phone" value="{{json_decode($property->contact_detail)->phone}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-md button-theme">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
<!-- Dashboard end -->

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
@endsection