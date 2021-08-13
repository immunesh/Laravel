@extends('layouts.TdashboardL')
@section('content')
<div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>My Profile</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{url('home')}}">Dashboard</a>
                                        </li>
                                        <li class="active">User Profile</li>
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
                            <h3 class="heading">Profile Details</h3>
                            <div class="dashboard-message contact-2 bdr clearfix">
                                <form action="{{url('editprofile/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3">
                                            <!-- Edit profile photo -->
                                            <div class="edit-profile-photo">
                                                @if($user->profile != null)
                                                    <img src="{{url('public/uploads/'.$user->profile)}}" alt="profile-photo" class="img-fluid" id="profile_image">
                                                @else
                                                    <img src="{{url('public/no_image.png')}}" alt="profile-photo" class="img-fluid" id="no_profile_image">
                                                @endif
                                                <div class="change-photo-btn">
                                                    <div class="photoUpload">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input type="file" class="upload" name="profile" id="profile_upload">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-9">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group name">
                                                        <label>Your Name</label>
                                                        <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="John Deo">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group email">
                                                        <label>Your Title</label>
                                                        <input type="text" name="title" value="{{$user->title}}" class="form-control" placeholder="Your Title">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group subject">
                                                        <label>Phone</label>
                                                        <input type="text" name="phonenumber" value="{{$user->phonenumber}}" class="form-control" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group number">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Email" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group message">
                                                        <label>Personal info</label>
                                                        <textarea class="form-control" name="personal_info" placeholder="Personal info">{{$user->personal_info}}</textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn button-theme">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="dashboard-list">
                                    <h3 class="heading">Change Password</h3>
                                    <div class="dashboard-message contact-2">
                                        <form action="{{url('/change_pass/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group name">
                                                        <label>Current Password</label>
                                                        <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group email">
                                                        <label>New Password</label>
                                                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group subject">
                                                        <label>Confirm New Password</label>
                                                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <button type="submit" class="btn btn-md button-theme">Change Password</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dashboard-list">
                                    <h3 class="heading">Socials</h3>
                                    <div class="dashboard-message contact-2">
                                        <form action="#" method="GET" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group name">
                                                        <label>Facebook</label>
                                                        <input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com/">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group email">
                                                        <label>Twitter</label>
                                                        <input type="text" name="twitter" class="form-control" placeholder="https://twitter.com/">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group subject">
                                                        <label>Instagram</label>
                                                        <input type="text" name="vkontakte" class="form-control" placeholder="vk.com">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group number">
                                                        <label>Whatsapp</label>
                                                        <input type="email" name="whatsapp" class="form-control" placeholder="https://www.whatsapp.com/">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <button type="submit" class="btn btn-md button-theme">Send Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script type="text/javascript">
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            
                            reader.onload = function (e) {
                                $('#profile_image').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            
                            reader.onload = function (e) {
                                $('#no_profile_image').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $("#profile_upload").change(function(){
                        readURL(this);
                    });
                </script>
@endsection