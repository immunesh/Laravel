@extends('layouts.AdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Requirements</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Requirement</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                        <form method="GET">
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
                            <h4> Tenant Requirement</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    @if(count($requirements) != 0)
                                        @foreach($requirements as $requirement)
                                            <div class="comment">
                                                <div class="comment-author">
                                                    <a href="#">
                                                        <img src="{{url('uploads/'.$requirement->user->profile)}}" alt="comments-user">
                                                    </a>
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-meta">
                                                        <h5>{{$requirement->user->name}}</h5>
                                                        <div class="comment-meta">
                                                            {{$requirement->created_at->format('h:m A m/d/Y')}}
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <li>Requirement of :<span> {{$requirement->req_name}}</span></li>
                                                        <li>Area in Sqft :<span> {{$requirement->area}} </span></li>
                                                        <li>Expected Rent :<span>Rs {{$requirement->expected_rent}}</span></li>
                                                        <li>Require in :<span> {{$requirement->req_in_days}} days</span></li>
                                                        <li>Specific Requirement :<span><p>{{$requirement->specific_req}}.</p></span></li>
                                                        <li>Mail : <span><a href="mailto:{{$requirement->email}}"> {{$requirement->email}}</a> </span></li>
                                                        <li>Phone : <span> <a href="tel:+79617036705">+{{$requirement->phone}}</a></span></li>
                                                    </ul>   
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h3>No Requirement Submitted by Tenant</h3>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection