@extends('layouts.AdashboardL')
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
                                            <a href="{{url('/dashboard')}}">Dashboard</a>
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
                        <form method="GET">
                            <h4>Appointments List</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    @if(count($appointments) != 0)
                                        @foreach($appointments as $appoint)
                                            <div class="comment">
                                                <div class="comment-author">
                                                    <a href="#">
                                                        <img src="{{url('/uploads/'.App\User::where('id',$appoint->user_id)->first()->profile)}}" alt="comments-user">
                                                    </a>
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-meta">
                                                        <h5>{{App\User::where('id',$appoint->user_id)->first()->name}}</h5>
                                                        <div class="comment-meta">
                                                            {{$appoint->created_at->format('h:m A  m/d/Y')}}
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <li>Appointed Property :<span><a href="#">{{App\Property::where('id',$appoint->property_id)->first()->property_title}}</a></span></li>
                                                        <li>Property Owner:<span><a href="#">{{App\User::where('id',App\Property::where('id',$appoint->property_id)->first()->user_id)->first()->name}}</a></span></li>
                                                        <li>Appointment date : <span> {{\Carbon \Carbon::parse($appoint->appointment_time)->format('d M Y')}}</span></li>
                                                        <li>Appointment time  :<span> {{\Carbon \Carbon::parse($appoint->appointment_time)->format('h:m A')}}</span></li>
                                                        <li>Mail : <span><a href="mailto:{{App\User::where('id',App\Property::where('id',$appoint->property_id)->first()->user_id)->first()->email}}"> 
                                                        {{App\User::where('id',App\Property::where('id',$appoint->property_id)->first()->user_id)->first()->email}}</a> </span></li>
                                                        <li>Phone : <span> <a href="tel:+79617036705">+{{App\User::where('id',App\Property::where('id',$appoint->property_id)->first()->user_id)->first()->phonenumber}}</a></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else 
                                        <h3>Sorry! NO Appoinments</h3>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection