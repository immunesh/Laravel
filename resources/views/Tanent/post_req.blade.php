@extends('layouts.TdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/home')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Post Requirement</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3>Fill Requirement</h3></br>
                        </br>
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{url('/store_req')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group name">
                                                <input type="text" name="name" class="form-control" placeholder="Name">
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group email">
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group number">
                                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{Auth::user()->phonenumber}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group subject">
                                                <input type="text" name="req_name" class="form-control" placeholder="Requirement of ">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group subject">
                                                <input type="text" name="area" class="form-control" placeholder="Area in Sqft">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group number">
                                                <input type="text" name="expected_rent" class="form-control" placeholder="Expected Rent-INR">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group number">
                                                <input type="text" name="req_in_days" class="form-control" placeholder="Requirement in Days">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group message">
                                                <textarea class="form-control" name="specific_req" placeholder="Specific Requirement"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="send-btn text-center">
                                                <button type="submit" class="btn btn-md button-theme">Post Requirement</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div></br></br></br></br></br>
                </div>
@endsection