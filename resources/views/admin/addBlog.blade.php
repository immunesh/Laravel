@extends('layouts.AdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Create Post</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Create Post</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3>Blog Details</h3></br>
                        </br>
                        <form action="{{url('addBlog')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group subject">
                                                <label>Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Blog Title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group subject">
                                                <label>Image</label>
                                                <input type="file" name="image" class="form-control" placeholder="Blog Image" required>
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <div class="form-group subject">
                                                <label>Body</label>
                                                <textarea class="form-control" name="description" id="body" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="send-btn text-center">
                                                <button type="submit" class="btn btn-md button-theme">Publish</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div></br></br></br></br></br>
                </div>
@endsection