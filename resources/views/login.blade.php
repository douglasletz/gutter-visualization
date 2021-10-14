@extends("layouts.master")


@section("title")
Login | Rain Gutter Visualizer
@endsection


@section("content")
        <!--Page Title-->
        <section class="page-title" style="background-image:url({{ asset('/images/background/6.jpg') }});">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>Login</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->

        <!--Login Section-->
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif


        @if ($message = Session::get('success'))
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="alert alert-success">
                    <p>{!! $message !!}</p>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        @endif

        <section class="login-section">
            <div class="auto-container">
                <div class="row d-flex justify-content-center">
                    <div class="column col-md-6 col-sm-12 col-xs-12">

                        <!-- Login Form -->
                        <div class="login-form register-form">
                            <!--Login Form-->
                            <form  method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email Address" >
                                    @if(old('login') != null)
                                    @error('email')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Enter Your Password">


                                    @if(old('login') != null)
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @endif

                                </div>

                                <div class="login-redirections">
                                  <a href="signup" class="float-left"><i class="la la-unlock"></i> Create An Account</a>
                                  <a href="{{route('forgot_password')}}" class="float-right"><i class="la la-unlock-alt"></i> Forgot Password?</a>  
                              </div>

                              <div class="form-group centered">
                                <input class="theme-btn btn-style-three mt-2" type="submit" name="login" value="LOGIN">
                            </div>

                        </form>
                    </div>
                    <!--End Login Form -->
                </div>
            </div>
        </div>
    </section>
    <!--End Login Section-->
@endsection
