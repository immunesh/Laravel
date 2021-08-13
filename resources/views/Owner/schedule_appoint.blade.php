@extends('layouts.dashboardL')
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
                                            <a href="{{url('owner/dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Appointments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                        <form method="GET">
                            <h4>Appointments List</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                @foreach($appoint as $apnt)
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="{{url('/uploads/'.App\User::where('id',$apnt->tenant_id)->first()->profile)}}" alt="comments-user">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5>{{App\User::where('id',$apnt->tenant_id)->first()->name}}</h5>
                                                <div class="comment-meta">
                                                    {{$apnt->created_at->format('h:m A m/d/Y')}}
                                                </div>
                                            </div>
                                            <ul>
                                                <li>Appointed Property :<span><a href="#">{{App\Property::where('id',$apnt->property_id)->first()->property_title}}</a></span></li>
                                                <li>Appointment date : <span> {{\Carbon \Carbon::parse(App\Appointment::where('property_id',$apnt->property_id)->first()->appointment_time)->format('d M Y')}}</span></li>
                                                <li>Appointment time  :<span> {{\Carbon \Carbon::parse(App\Appointment::where('property_id',$apnt->property_id)->first()->appointment_time)->format('h:m A')}}</span></li>
                                                <li>Mail : <span><a href="mailto:{{App\User::where('id',$apnt->tenant_id)->first()->email}}"> 
                                                {{App\User::where('id',$apnt->tenant_id)->first()->email}}</a> </span></li>
                                                <li>Phone : <span> <a href="tel:+79617036705">+{{App\User::where('id',$apnt->tenant_id)->first()->phonenumber}}</a></span></li>
                                            </ul>
                                            <div class="buttons mb-20">
                                               <!-- <a href="#" class="btn-1 btn-gray"><i class="fa fa-fw fa-check-circle-o"></i> Approve</a>
                                                <a href="#" class="btn-1 btn-gray"><i class="fa fa-fw fa-times-circle-o"></i> Cancel</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                      <h3>Sorry! No Appointment till now,Stay tuned for Tenant visit,Click on <a href="{{url('submit_property')}}" class="btn btn-theme btn-md"> Submit Property</a></h3>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection