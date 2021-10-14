    <!-- Main Header-->
    <header class="main-header header-style">
        <!--Header Top-->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container clearfix">

                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 col-12">
                            <div class="top-left">
                               <div class="logo-box">
                                <div class="logo">
                                    <a href="{{route('index')}}"><img src="{{ asset('/images/logo-favicon.png') }}" alt="" title=""><span>apple gutters</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="custom-visible">
                            <div class="outer-box">
                             <div class="btn-box">

                                @if (Auth::user()) 
                                <div class="dropdown">
                                  <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Welcome, {{ Auth::user()->first_name }}  <i class="la la-caret-down"></i>
                                </a>
                                <div class="header dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('home')}}">Saved Projects</a>
                                    <a class="dropdown-item" href="{{route('change_password')}}">Change Password</a>
                                    @if(auth()->user()->admin == 1)
                                    <a class="dropdown-item" href="{{route('admin_index')}}">Admin
                                    Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @else
                        <a href="/signin" class="theme-btn btn-style-three">Login</a>
                        <a href="/signup" class="theme-btn btn-style-three">Register</a>
                        @endif

                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-4">
            <div class="top-center">
                <ul class="contact-list clearfix">
                    <li><i class="la la-envelope-o"></i><a href="mailto:info@example.com">info@example.com</a></li>
                    <li><i class="la la-mobile"></i><a href="tel:+12 11 89 2222">+12 11 89 2222</a></li>
                </ul>       
            </div>

        </div>
        <div class="col-lg-4 col-md-5">
            <div class="top-right">
                           <!-- <ul class="social-icon-one clearfix">
                            <li><a href="#"><i class="la la-instagram"></i></a></li>
                            <li><a href="#"><i class="la la-facebook"></i></a></li>
                            <li><a href="#"><i class="la la-youtube"></i></a></li>

                        </ul> -->
                        <div class="outer-box">
                         <div class="btn-box">

                            @if (Auth::user()) 
                            <div class="dropdown">
                              <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Welcome, {{ Auth::user()->first_name }}  <i class="la la-caret-down"></i>
                            </a>
                            <div class="header dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('home')}}">Saved Projects</a>
                                <a class="dropdown-item" href="{{route('change_password')}}">Change Password</a>
                                @if(auth()->user()->admin == 1)
                                <a class="dropdown-item" href="{{route('admin_index')}}">Admin
                                Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @else
                    <a href="/signin" class="theme-btn btn-style-three">Login</a>
                    <a href="/signup" class="theme-btn btn-style-three">Register</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
<!-- End Header Top -->

<!-- Header Lower -->
<div class="header-lower">
    <div class="auto-container">
        <div class="main-box">
            <div class="inner-container clearfix">


                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon flaticon-menu"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('project_gallery')}}">Select Sample Home</a></li>
                                <li><a href="{{route('project_new')}}">Upload Home</a></li>
                                <li><a href="{{route('gutter_calculator')}}">Gutter Calculator</a></li>
                                <li><a href="{{route('about')}}">About</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>              
                        </div>
                    </nav><!-- Main Menu End-->

                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Header Lower-->

<!-- Sticky Header  -->
<div class="sticky-header">
    <div class="auto-container clearfix">
        <!--Logo-->
        <div class="logo pull-left">
            <a href="{{route('index')}}">
                <img src="{{ asset('/images/logo-favicon.png') }}" alt="" title=""><span>apple gutter</span> </a>
            </div>
            <!--Right Col-->
            <div class="pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-collapse show collapse clearfix">
                        <ul class="navigation clearfix">
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('project_gallery')}}">Select Sample Home</a></li>
                            <li><a href="{{route('project_new')}}">Upload Home</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>
        </div>
    </div><!-- End Sticky Menu -->
</header>
<!--End Main Header -->