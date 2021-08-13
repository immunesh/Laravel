

@include('layouts.master.header')
<!-- Contact section start -->
<div class="contact-section overview-bgi" style="background: rgba(0, 0, 0, 0.04) url(../img/banner/banner-2.jpg) top left repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo -->
                        
                        <!-- Name -->
                        <h3>Reset your password</h3>

                        <!-- Form start -->
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <input id="email" type="email" class="input-text @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="input-text  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
                            
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="input-text" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">Send Me Email</button>
                            </div>
                        </form>
                        <!-- Social List -->
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Already a member? <a href="{{ route('login') }}">Login here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="http://storage.googleapis.com/themevessel-products/neer/index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div>

<script src="{{asset('/assets/js/jquery-2.2.0.min.js')}}"></script>
<script src="{{asset('/assets/js/popper.min.js')}}"></script>
<script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
<script  src="{{asset('/assets/js/bootstrap-submenu.js')}}"></script>
<script  src="{{asset('/assets/js/rangeslider.js')}}"></script>
<script  src="{{asset('/assets/js/jquery.mb.YTPlayer.js')}}"></script>
<script  src="{{asset('/assets/js/bootstrap-select.min.js')}}"></script>
<script  src="{{asset('/assets/js/jquery.easing.1.3.js')}}"></script>
<script  src="{{asset('/assets/js/jquery.scrollUp.js')}}"></script>
<script  src="{{asset('/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script  src="{{asset('/assets/js/leaflet.js')}}"></script>
<script  src="{{asset('/assets/js/leaflet-providers.js')}}"></script>
<script  src="{{asset('/assets/js/leaflet.markercluster.js')}}"></script>
<script  src="{{asset('/assets/js/dropzone.js')}}"></script>
<script  src="{{asset('/assets/js/slick.min.js')}}"></script>
<script  src="{{asset('/assets/js/jquery.filterizr.js')}}"></script>
<script  src="{{asset('/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script  src="{{asset('/assets/js/jquery.countdown.js')}}"></script>
<script  src="{{asset('/assets/js/maps.js')}}"></script>
<script  src="{{asset('/assets/js/app.js')}}"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="{{asset('/assets/js/ie10-viewport-bug-workaround.js')}}"></script>
<!-- Custom javascript -->
<script  src="{{asset('/assets/js/ie10-viewport-bug-workaround.js')}}"></script>
</body>

</html>