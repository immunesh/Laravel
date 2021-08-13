@extends('layouts.AdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Tenants listed</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Tenants List</li>
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
                                @if(count($tenants) != 0)
                                    @foreach($tenants as $tenant)
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="row team-2">
                                                <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-pad ">
                                                    <div class="photo">
                                                        @if($tenant->profile != null)
                                                            <img src="{{url('public/uploads/'.$tenant->profile)}}" alt="avatar-9" class="img-fluid" style="height: 200px; width: 200px">
                                                        @else
                                                            <img src="{{url('public/no_image.png')}}" alt="avatar-9" class="img-fluid" style="height: 200px; width: 200px">
                                                        @endif
                                                     </div>
                                                </div>
                                                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-pad align-self-center bg">
                                                     <div class="detail">
                                                        <h4>
                                                            <a href="#">{{$tenant->name}}</a>
                                                        </h4>
                                                        <h5>{{$tenant->title}}</h5>
                                                        <div class="contact">
                                                            <ul>
                                                                <li>
                                                                    <!-- <i class="flaticon-pin"></i><a>44 New Design Street,</a> -->
                                                                </li>
                                                                <li>
                                                                    <i class="flaticon-mail"></i><a href="mailto:{{$tenant->email}}">{{$tenant->email}}</a>
                                                                </li>
                                                                <li>
                                                                    <i class="flaticon-phone"></i><a href="tel:+554XX-634-7071"> +{{$tenant->phonenumber}}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="buttons mb-20">
                                                            
                                                            <a href="{{url('/del_tenant/'.$tenant->id)}}" class="btn-1 btn-gray"><i class="fa fa-fw fa-times-circle-o"></i> Delete</a>
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
                                    <h3>Sorry! No tenant Connected</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
@endsection