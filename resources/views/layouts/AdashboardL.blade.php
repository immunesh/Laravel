@include('layouts.master.header')
<!-- Main header start -->
<header class="main-header header-2 fixed-header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo pad-0" href="{{url('/')}}">
                <img src="{{url('img/logos/black-logo.png')}}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
                    <li class="nav-item dropdown active">
                        <a href="{{url('dashboard')}}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('booking')}}" class="nav-link">Bookings</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('requirement')}}" class="nav-link">Requirements</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('scheduleappoint')}}" class="nav-link">Appointments</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('rentagreement')}}" class="nav-link">Agreements</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('adminproperties')}}" class="nav-link">Properties</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('admin/submit_property')}}" class="nav-link">Post Property</a>
                    </li>
                     <li class="nav-item dropdown">
                        <a href="{{url('ownerlist')}}" class="nav-link">Owners</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('tenants')}}" class="nav-link"> Tenants </a>
                    </li>
                     <li class="nav-item dropdown">
                        <a href="{{url('blogs')}}" class="nav-link">Blogs</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('addblog')}}" class="nav-link"> Add Blogs</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('sendagreement')}}" class="nav-link"> Send Agreement</a>
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
                                        <img src="{{url('public/uploads/'.Auth::user()->profile)}}" alt="avatar-9" class="img-fluid">
                                    @else
                                        <img src="{{url('public/no_image.png')}}" alt="avatar-9" class="img-fluid">
                                    @endif
                                    
                                    {{Auth::user()->name}}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('dashboard')}}">Dashboard</a>
                                    <a class="dropdown-item" href="{{url('requirement')}}">Requirements</a>
                                    <a class="dropdown-item" href="#">Bookings</a>
                                    <a class="dropdown-item" href="{{url('scheduleappoint')}}">Appointments</a>
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
                            <a class="btn btn-theme btn-md" href="{{url('admin/submit_property')}}">Post property</a>
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
                            <li class="active"><a href="{{url('dashboard')}}"><i class="flaticon-dashboard"></i> Dashboard</a></li>
                            <li><a href="{{url('requirement')}}"><i class="flaticon-bill"></i> Requirements</a></li>
                            <li><a href="#"><i class="flaticon-calendar"></i> Bookings</a></li>
                        </ul>
                        <h4>Listings</h4>
                        <ul>
                            <li><a href="{{url('adminproperties')}}"><i class="flaticon-apartment-1"></i> Properties</a></li>
                            <li><a href="{{url('admin/submit_property')}}"><i class="flaticon-plus"></i>Post Property</a></li>
                            <li><a href="#"><i class="flaticon-bill"></i>Owner Invoices</a></li>
                            <li><a href="#"><i class="flaticon-bill"></i>Tenant Invoices</a></li>
                        </ul>
                        <h4>Appointments</h4>
                        <ul>
                          <li><a href="{{url('scheduleappoint')}}"><i class="flaticon-calendar"></i>Appointments</a></li>
                          <li><a href="{{url('rentagreement')}}"><i class="flaticon-bill"></i>Agreements</a></li>
                          <li><a href="{{url('sendagreement')}}"><i class="flaticon-plus"></i>Send Agreements</a></li>
                        </ul>
                        <h4>Users</h4>
                        <ul>
                          <li><a href="{{url('ownerlist')}}"><i class="flaticon-people"></i>Owners</a></li>
                          <li><a href="{{url('tenants')}}"><i class="flaticon-people"></i>Tenants</a></li>
                        </ul>
                        <h4>Blogs</h4>
                        <ul>
                          <li><a href="{{url('addblog')}}"><i class="flaticon-calendar"></i>Add Blogs</a></li>
                          <li><a href="{{url('blogs')}}"><i class="flaticon-bill"></i>Blogs</a></li>
                        </ul>
                        <h4>Packages</h4>
                        <ul>
                            <li><a href="{{url('ownerpackages')}}"><i class="flaticon-bill"></i>Owner packages</a></li>
                            <li><a href="{{url('tenantpackages')}}"><i class="flaticon-bill"></i> Tenant packages</a></li>
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