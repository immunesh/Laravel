@extends('layouts.TdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>My Properties</h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="{{url('/')}}">Home</a>
                                            </li>
                                            <li>
                                                <a href="{{url('/home')}}">Dashboard</a>
                                            </li>
                                            <li class="active">shortlisted Properties</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-list">
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
                            <h3>My Properties List</h3>
                            <table class="manage-table">
                                <tbody>
                                    @if(count($pro_appoint) != 0)
                                        @foreach($pro_appoint as $appoint)
                                        <tr class="responsive-table">
                                            <td class="listing-photoo">
                                                @foreach(json_decode($appoint->gallery) as $img)
                                                    <img src="{{url('public/uploads/'.$img)}}" alt="listing-photo" class="img-fluid">
                                                    @break
                                                @endforeach
                                            </td>
                                            <td class="title-container">
                                                <h2><a href="#">{{$appoint->property_title}}</a></h2>
                                                <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i> {{json_decode($appoint->location)->address}}  {{json_decode($appoint->location)->city}}  {{json_decode($appoint->location)->postal_code}}, </h5>
                                                <h6 class="table-property-price">{{$appoint->price}} / monthly</h6>
                                                <h6>Owner Name: {{json_decode($appoint->contact_detail)->name}}</h6> 
                                                <h6>Owner Contact: {{json_decode($appoint->contact_detail)->phone}}</h6> 
                                                <h5>Owner Mail: {{json_decode($appoint->contact_detail)->email}}</h5> 
                                            </td>
                                            <!-- <td class="expire-date">4.01.2018</td> -->
                                            <!--<td class="action">-->
                                            <!--    <a href="#"><i class="fa  fa-eye-slash"></i> Hide</a>-->
                                            <!--    <a href="#" class="delete"><i class="fa fa-remove"></i> Delete</a>-->
                                            <!--</td>-->
                                        </tr>
                                        @endforeach
                                    @else
                                        <h3>Sorry!You not visited any Property, Click here <a href="{{url('/properties')}}" class="btn btn-theme btn-md"> More Properties</a>for visiting</h3>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{$pro_appoint->links()}}
                    </div>
                </div>
@endsection