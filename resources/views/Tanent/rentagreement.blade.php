@extends('layouts.TdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Rent Agreements</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/home')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Agreements</li>
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
                            <h4>Agreements List</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    @if(count($agreements) != 0 )
                                        @foreach($agreements as $agreement)
                                            <div class="comment">
                                                <div class="comment-author">
                                                    <a href="#">
                                                        <img src="{{url('public/no_image.png')}}" alt="comments-user">
                                                    </a>
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-meta">
                                                        <h5>Maikel Alisa</h5>
                                                        <div class="comment-meta">
                                                            {{$agreement->created_at->format('h:m A m/d/Y')}}
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <li>Tenant Name  :<span><a href="#"> {{App\User::where('id',$agreement->tenant_id)->first()->name}}</a></span></li>
                                                        <li>Owner Name :<span><a href="#"> {{App\User::where('id',$agreement->owner_id)->first()->name}}</a></span></li>
                                                        <li>Property Title :<span><a href="#"> {{App\Property::where('id',$agreement->property_id)->first()->property_title}}</a></span></li>
                                                        <li>Agreement start date : <span> {{\Carbon \Carbon::parse($agreement->start_date)->format('d M Y')}}</span></li>
                                                        <li>Agreement End date : <span> {{\Carbon \Carbon::parse($agreement->start_date)->format('d M Y')}}</span></li>
                                                        <li>Download Agreement File :<span><a target="_blank" href="{{url('public/AgreementFiles/'.$agreement->agrmt_file)}}">Agreement File</a></span></li>
                                                        <li>Message :<span><p>{{$agreement->message}}.</p></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h3>Sorry! Rentobro not send any Rent agreement till now, Click here <a href="{{url('/properties')}}" class="btn btn-theme btn-md">More Properties</a>for visiting</h3>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection