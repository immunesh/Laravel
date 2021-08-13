@extends('layouts.AdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Owner Package list</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Owner Packages</li>
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
                        <form method="GET">
                            <h4>Owner Packages List</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    @if(count($o_package) != 0)
                                        @foreach($o_package as $package)
                                            <div class="comment">
                                            <div class="comment-author">
                                                <a href="#">
                                                    @if($package->profile != null)
                                                        <img src="{{url('public/uploads/'.$package->profile)}}" alt="comments-user">
                                                    @else
                                                        <img src="{{url('public/no_image.png')}}" alt="comments-user">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="comment-content">
                                                <div class="comment-meta">
                                                    <h4 style="border: none">{{$package->name}}</h4>
                                                    <div class="comment-meta">
                                                        
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>Package Name :<span>{{$package->plan_name}}</span></li>
                                                    <li>Package Prize(INR) :<span>{{$package->price}}</span></li>
                                                    <li>Mail : <span><a href="mailto:{{$package->email}}"> {{$package->email}}</a> </span></li>
                                                    <li>Phone : <span> <a href="tel:+{{$package->phonenumber}}">+{{$package->phonenumber}}</a></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <h3>Owner Not Subscribed and Plan</h3>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection