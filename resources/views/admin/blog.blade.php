@extends('layouts.AdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>Blogs</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="active">Blogs</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-body content-area">
                        <div class="container">
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
                            <div class="row">
                                @if(count($blogs) != 0)
                                    @foreach($blogs as $blog)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="blog-1">
                                                <div class="blog-photo">
                                                    @if($blog->image != null)
                                                        <img src="{{url('public/uploads/'.$blog->image)}}" alt="small-blog" class="img-fluid">
                                                    @else
                                                        <img src="{{url('public/no_image.png')}}" alt="small-blog" class="img-fluid">
                                                    @endif
                                                    <div class="date-box">
                                                    <span>{{$blog->created_at->format('d')}}</span>{{$blog->created_at->format('m')}}
                                                    </div>
                                                </div>
                                                <div class="detail">
                                                    <h3>
                                                        <a href="{{url('/blog_detail/'.$blog->id)}}">{{$blog->title}}</a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <span><a><i class="flaticon-people"></i>Rentobro</a></span>
                                                        <!--<span><a href="#"><i class="fa fa-edit"></i>27</a></span>-->
                                                        <!--<span><a href="#"><i class="fa fa-trash"></i>27</a></span>-->
                                                    </div>
                                                    <p>{{Str::limit($blog->description, 120)}}</p>
                                                    <a href="{{url('blog_detail/'.$blog->id)}}" class="read-more">Read more</a>
                                                    </br>
                                                    <a href="{{url('delblog/'.$blog->id)}}" class="delete"><i class="fa fa-remove"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3>Sorry No Blogs Found</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                   
            
@endsection