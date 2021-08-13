@extends('layouts.AdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Owner listed</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Owner List</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="our-team content-area">
                        <div class="container">
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
                            <div class="row">
                                @if(count($owners)!= 0)
                                    @foreach($owners as $owner)
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="row team-2">
                                                <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad ">
                                                    <div class="photo">
                                                        @if($owner->image != null)
                                                            <img src="{{url('public/uploads/'.$owner->image)}}" alt="small-blog" class="img-fluid">
                                                        @else
                                                            <img src="{{url('public/no_image.png')}}" alt="small-blog" class="img-fluid">
                                                        @endif
                                                     </div>
                                                </div>
                                                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad align-self-center bg">
                                                     <div class="detail">
                                                        <h4>
                                                            <a href="#">{{$owner->name}}</a>
                                                        </h4>
                                                        <h5>{{$owner->title}}</h5>
                                                        <div class="contact">
                                                            <ul>
                                                                <li>
                                                                    <!-- <i class="flaticon-pin"></i><a>44 New Design Street,</a> -->
                                                                </li>
                                                                <li>
                                                                    <i class="flaticon-mail"></i><a href="mailto:info@themevessel.com">{{$owner->email}}</a>
                                                                </li>
                                                                <li>
                                                                    <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +{{$owner->phonenumber}}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="buttons mb-20">
                                                            <!--<a href="#" class="btn-1 btn-gray"><i class="fa fa-fw fa-times-circle-o"></i> Hide</a>-->
                                                            <a href="{{url('/del_tenant/'.$owner->id)}}" class="btn-1 btn-gray"><i class="fa fa-fw fa-times-circle-o"></i> Delete</a>
                                                        </div>
                                                        <ul class="social-list clearfix">
                                                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3>Sorry! No Owner Connected</h3>
                                @endif    
                            </div>
                        </div>
                    </div>
                </div>
@endsection