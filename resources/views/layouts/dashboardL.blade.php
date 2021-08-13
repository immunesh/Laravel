@include('layouts.master.header')
<header class="main-header header-2 fixed-header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo pad-0" href="{{url('/')}}">
                <img src="img/logos/black-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
                    <li class="nav-item dropdown active">
                        <a href="{{url('owner/dashboard')}}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">Bookings</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('owner/my_properties')}}" class="nav-link">Properties</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('owner/dashboard')}}" class="nav-link">Invoices</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('/submit_property')}}" class="nav-link">Post Property</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('owner/profile')}}" class="nav-link">My Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('/owner/pricing')}}" class="nav-link">Packages</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('owner/refer')}}" class="nav-link">Refer & Earn</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class="fa fa-address-book"></i>{{ __('Logout') }}
                        </a> 

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
                    <ul>
                        <li>
                            <div class="dropdown btns">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    @if(Auth::user()->profile != null)
                                        <img src="{{url('public/uploads/'.Auth::user()->profile)}}" alt="profile-photo">
                                    @else
                                        <img src="{{url('public/no_image.png')}}" alt="profile-photo">
                                    @endif
                                    
                                    My Account
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('owner/dashboard')}}">Dashboard</a>
                                    <a class="dropdown-item" href="#">Bookings</a>
                                    <a class="dropdown-item" href="{{url('owner/profile')}}">My profile</a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fa fa-address-book"></i>{{ __('Logout') }}
                                    </a> 

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="btn btn-theme btn-md" href="{{url('/owner/pricing')}}">Packages</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Dashbord start -->
<div class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-none d-xl-block d-lg-block">
                    <div class="dashboard-inner">
                        <h4>Main</h4>
                        <ul>
                            <li class="active"><a href="{{url('owner/dashboard')}}"><i class="flaticon-dashboard"></i> Dashboard</a></li>
                            <li><a href="#"><i class="flaticon-calendar"></i> Bookings</a></li>
                        </ul>
                        <h4>Listings</h4>
                        <ul>
                            <li><a href="{{url('owner/my_properties')}}"><i class="flaticon-apartment-1"></i>My Properties</a></li>
                            <li><a href="{{url('/submit_property')}}"><i class="flaticon-plus"></i>Post Property</a></li>
                            <li><a href="#"><i class="flaticon-bill"></i>Invoices</a></li>
                        </ul>
                        <h4>Appointments</h4>
                        <ul>
                          <li><a href="{{url('owner/schedule_appoint')}}"><i class="flaticon-calendar"></i>Previous Appointments</a></li>
                          <li><a href="{{url('owner/rent_agreemnt')}}"><i class="flaticon-bill"></i> Rent Agreement</a></li>
                        </ul>
                        <h4>Users</h4>
                        <ul>
                          <li><a href="{{url('owner/tanents')}}"><i class="flaticon-people"></i>Tenants</a></li>
                        </ul>
                        <h4>Account</h4>
                        <ul>
                            <li><a href="{{url('owner/profile')}}"><i class="flaticon-people"></i>My Profile</a></li>
                            <li><a href="{{url('owner/refer')}}"><i class="flaticon-calendar"></i> Refer & Earn</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fa fa-address-book"></i>{{ __('Logout') }}
                                </a> 

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @yield('content')

        </div>
    </div>
</div>
@include('layouts.master.footer')