@extends('layouts.AdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Rent Agreement</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Send Agreement</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3>Agreement Details</h3></br>
                        </br>
                        <form action="{{url('store_agreement')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-10">
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group number">
                                                <label class="label-control">Select Tenant</label>
                                                <select name="tenant" class="form-control" placeholder="Tenant Name ">
                                                    @foreach($tenants as $tenant)
                                                        <option value="{{$tenant->id}}">{{$tenant->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="form-group number">
                                                <label  class="label-control">Select Owner</label>
                                                <select name="owner" class="form-control" placeholder="Property Owner Name">
                                                    @foreach($owners as $owner)
                                                        <option value="{{$owner->id}}">{{$owner->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group number">
                                                <label  class="label-control">Select Property</label>
                                                <select name="property_id" class="form-control" placeholder="Property Title">
                                                    @foreach($properties as $property)
                                                        <option value="{{$property->id}}">{{$property->property_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label  class="label-control">Agreement Start Date</label>
                                            <div class="form-group number">
                                                <input type="date" name="start_date" class="form-control" placeholder="Agreement Start Date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label  class="label-control">Agreement End Date</label>
                                            <div class="form-group number">
                                                <input type="date" name="end_date" class="form-control" placeholder="Agreement End Date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label  class="label-control">Select Agreement file</label>
                                            <div class="form-group number">
                                                <input type="file" id="myfile" name="agrmt_file" multiple class="form-control" placeholder="Select Files">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label  class="label-control">message</label>
                                            <div class="form-group message">
                                                <textarea class="form-control" name="message" placeholder="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="send-btn text-center">
                                                <button type="submit" class="btn btn-md button-theme">Send agreement</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div></br></br></br></br></br>
                </div>
@endsection