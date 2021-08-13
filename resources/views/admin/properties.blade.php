@extends('layouts.AdashboardL')
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
                                                <a href="{{url('/dashboard')}}">Dashboard</a>
                                            </li>
                                            <li class="active">My Properties</li>
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
                                    @if(count($properties) != 0)
                                        @foreach($properties as $property)
                                            <tr class="responsive-table">
                                                <td class="listing-photoo">
                                                    @foreach(json_decode($property->gallery) as $img)
                                                        <img src="{{url('public/uploads/'.$img)}}" alt="listing-photo" class="img-fluid">
                                                        @break
                                                    @endforeach
                                                </td>
                                                <td class="title-container">
                                                    <h2><a href="{{url('/property_detail/'.$property->id)}}">{{$property->property_title}}</a></h2>
                                                    <h5 style="fort-weight: bold">Owner : <span> {{App\User::where('id',$property->user_id)->first()->name}}</span></h5>
                                                    <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i>{{json_decode($property->location)->address}} 
                                                {{json_decode($property->location)->neighbourhood}} 
                                                {{json_decode($property->location)->state}}
                                                {{json_decode($property->location)->postal_code}}, </h5>
                                                    <h6 class="table-property-price">{{$property->price}} / monthly</h6>
                                                </td>
                                                <!--<td class="expire-date">4.01.2018</td>-->
                                                <td class="action">
                                                    <a href="{{url('admin/edit_property/'.$property->id)}}"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="#"><i class="fa  fa-eye-slash"></i> Hide</a>
                                                    <a href="{{url('admin/delete_property/'.$property->id)}}" class="delete"><i class="fa fa-remove"></i> Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <h3>Sorry! NO Property Listed <a href="{{url('admin/submit_property')}}" style="color: blue">Click here</a> to add Property</h3>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $properties->links() }}
                </div>
            </div>
@endsection