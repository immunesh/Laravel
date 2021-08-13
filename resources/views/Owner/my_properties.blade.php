@extends('layouts.dashboardL')
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
                                                <a href="{{url('/owner/dashboard')}}">Dashboard</a>
                                            </li>
                                            <li class="active">My Properties</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-list">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            
                            <h3>My Properties List</h3>
                            <table class="manage-table">
                                <tbody>
                                    @if(count($my_properties) != 0 )
                                        @foreach($my_properties as $my_property)
                                            <tr class="responsive-table">
                                                <td class="listing-photoo">
                                                @foreach(json_decode($my_property->gallery) as $img)
                                                        <img src="{{url('public/uploads/'.$img)}}" alt="listing-photo" class="img-fluid">
                                                        @break
                                                    @endforeach                                        </td>
                                                <td class="title-container">
                                                    <h2><a href="#">{{$my_property->property_title}}</a></h2>
                                                    <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i> {{json_decode($my_property->location)->address}}  {{json_decode($my_property->location)->neighbourhood}}  {{json_decode($my_property->location)->state}}  {{json_decode($my_property->location)->postal_code}}, </h5>
                                                    <h6 class="table-property-price">{{$my_property->price}} / monthly</h6>
                                                </td>
                                                <td class="expire-date">{{$my_property->created_at->format('M, d Y')}}</td>
                                                <td class="action">
                                                    <a href="{{url('/edit_property/'.$my_property->id)}}"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="#"><i class="fa  fa-eye-slash"></i> Hide</a>
                                                    <a href="{{url('/delete_property/'.$my_property->id)}}" class="delete"><i class="fa fa-remove"></i> Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <h3>Sorry no Property added by You <a href="{{url('submit_property')}}">click here</a> to add Property</h3>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $my_properties->links() }}
                    </div>
                </div>
            
                   
@endsection