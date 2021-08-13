@extends('layouts.TdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Hello , Tenant {{Auth::user()->name}}</h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="{{url('/')}}">Home</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/home')}}" class="active">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        @if($colimit != null)
                            @if($total_co < $colimit->no_of_contact_owner)
                            <div class="alert alert-danger alert-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Plan Used</strong> Your Plan is totally used <a href="{{url('tanent/pricing')}}" style="color: blue">click Here</a> to subscribe a new Plan
                            </div>
                            @else
                            <div class="alert alert-success alert-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Your listing</strong> YOUR LISTING HAS BEEN APPROVED!
                            </div>
                            @endif
                        @else
                        <div class="alert alert-danger alert-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Plan Not Subscribed! </strong> Please Subscribe Atleast free Plan
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-success">
                                    <div class="left">
                                        <h4>{{$appoint}}</h4>
                                        <p>Appointments</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-warning">
                                    <div class="left">
                                        <h4>{{$req}}</h4>
                                        <p>Requirements</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-active">
                                    <div class="left">
                                        <h4>{{$tproperty}}</h4>
                                        <p>Properties</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="ui-item bg-dark">
                                    <div class="left">
                                        <h4>42</h4>
                                        <p>Favourite</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-heart-o"></i>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

@endsection
