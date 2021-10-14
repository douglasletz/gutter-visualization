@extends("layouts.master")


@section("title")
Change Password | Rain Gutter Visualizer
@endsection

@section("content")
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
        <div class="row clearfix">
            <div class="column col-md-6 col-sm-12 col-xs-12">

                <!-- Login Form -->
                <div class="login-form register-form">
                    <!--Login Form-->
                    <form method="POST" action="{{ route('change_password_post') }}">
                        @csrf

                        <div class="form-group">
                            <label>Old Password</label>


                            <input id="old_password" type="password" name="old_password" autocomplete="old-password" autofocus>

                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group">
                         <label>New Password</label>


                         <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" value="{{ $password ?? old('password') }}" autocomplete="password">

                         @error('password')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                     <label>Confirm Password</label>

                     <input id="password-confirm" type="password" name="confirm-password" autocomplete="new-password">
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
<!--End Login Section-->

@endsection
