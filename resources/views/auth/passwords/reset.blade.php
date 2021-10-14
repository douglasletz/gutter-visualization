@extends('layouts.master')


@section("title")
Change Password | Rain Gutter Visualizer
@endsection

@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('/images/background/6.jpg') }});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <h1>Change Password</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Change Password</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<section class="login-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="column col-md-6 col-sm-12 col-xs-12">

                <!-- Login Form -->
                <div class="login-form register-form">
                    <!--Login Form-->
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label>Email Address</label>

                           
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group">
                            <label>Password</label>

                          
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group">
                            <label>Confirm Your Password</label>

                           
                                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
                           
                        </div>

                        <div class="form-group centered">
                          
                                <button type="submit" class="theme-btn btn-style-three">
                                    {{ __('Reset Password') }}
                                </button>
                           
                        </div>
                    </form>
            </div>
            <!--End Login Form -->
        </div>


    </div>
</div>
</section>

@endsection