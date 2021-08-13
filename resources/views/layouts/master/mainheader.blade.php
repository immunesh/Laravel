<!-- Main header start -->
<header class="main-header header-transparent sticky-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="{{url('/')}}">
                <img src="{{url('/img/logos/logo.png')}}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item sp">
                        <a href="{{url('/')}}" class="nav-link link-color"> Home</a>
                    </li>
                    <li>
                        <a href="{{url('/about_us')}}" class="nav-link link-color"> About Us</a>
                    </li>
                    <li>
                        <a href="{{url('/faq')}}" class="nav-link link-color"> Faqs</a>
                    </li>                            
                    <li>
                        <a href="{{url('contact')}}" class="nav-link link-color"> Contact</a>
                    </li>
                    @if(Auth::check())
                        @if(Auth::user()->user_type == 1)
                            <li><a class="nav-link link-color" href="{{url('dashboard')}}">Dashboard</a></li>
                        @elseif(Auth::user()->user_type == 2)
                            <li><a class="nav-link link-color" href="{{url('owner/dashboard')}}">Dashboard</a></li>
                        @else
                            <li><a class="nav-link link-color" href="{{url('home')}}">Dashboard</a></li>
                        @endif
                    @endif
                    <li class="nav-item dropdown">
                        <a href="{{ route('register') }}" class="nav-link link-color"><i class="fa  fa-address-book-o"></i> Register</a>
                    </li>
                    <li class="nav-item sp">
                        @if(Auth::check())
                        <a class="nav-link link-color" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-address-book"></i>{{ __('Logout') }}
                        </a> 

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>                       
                        @else
                            <a href="{{ route('login') }}" class="nav-link link-color"><i class="fa fa-address-book"></i> Login</a>
                        @endif
                    </li>
                    <li class="nav-item sp">
                        <a href="{{url('submit_property')}}" class="btn btn-theme btn-md"> Submit Property</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->