@extends('layouts.TdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Schedule Appointments</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/home')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Appointments</li>
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
                        <h4>Schedule Appointments List</h4>
                        <div class="row pad-20">
                            <div class="col-lg-12">
                                @if(count($appoints) != 0)
                                    @foreach($appoints as $appoint)
                                        <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                @if($appoint->profile != null)
                                                    <img src="{{url('public/uploads/'.$appoint->profile)}}" alt="comments-user">
                                                @else
                                                    <img src="{{url('public/no_image.png')}}" alt="comments-user">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>{{$appoint->name}}</h5>
                                                <div class="comment-meta">
                                                    
                                                </div>
                                            </div>
                                            <ul>
                                                <li>Appointment of Property :<span><a href="#">{{$appoint->property_title}}</a></span></li>
                                                <li>Appointment date : <span> {{\Carbon \Carbon::parse($appoint->appointment_time)->format('d M Y')}}</span></li>
                                                <li>Appointment time :<span> {{\Carbon \Carbon::parse($appoint->appointment_time)->format('h:m A')}}</span></li>
                                                <li>Property Owner : <span><a href="#"> {{$appoint->name}}</a> </span></li>
                                                <li>Mail : <span><a href="mailto:{{$appoint->email}}"> {{$appoint->email}}</a> </span></li>
                                                <li>Phone : <span> <a href="tel:+{{$appoint->phonenumber}}">+{{$appoint->phonenumber}}</a></span></li>
                                            </ul>
                                            <div class="buttons mb-20">
                                                <!--<a href="#" class="btn-1 btn-gray"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a>-->
                                                <!--<a href="#" class="btn-1 btn-gray"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a>-->
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <h3>Sorry!You not schedule appointment to any Property, Click here <a href="{{url('/properties')}}" class="btn btn-theme btn-md">More Properties</a>for visiting</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
@endsection