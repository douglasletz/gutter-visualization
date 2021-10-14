@extends("layouts.master")


@section("title")
Forgot Password | Rain Gutter Visualizer
@endsection

@section("content")
<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('/images/background/6.jpg') }});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <h1>Forgot Password</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Forgot Password</li>
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

                   @if (session('status'))
                   <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <!--Login Form-->
                <form  method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        @if (!session('status'))
                        
                        
                        <label>Email Address</label>

                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group centered">
                        <input class="theme-btn btn-style-three" type="submit" name="password_reset" value="Send Password Reset Link">
                    </div>
                    @endif
                </form>
            </div>
            <!--End Login Form -->
        </div>


    </div>
</div>
</section>
<!--End Login Section-->

@endsection