@extends("layouts.master")


@section("title")
Register | Rain Gutter Visualizer
@endsection

@section("content")
<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('/images/background/6.jpg') }});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <h1>Register</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Register</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!--Register Section-->
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

                <!-- Register Form -->
                <div class="login-form register-form">

                    <form method="POST" action="{{ route('register') }}">

                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                <label>First Name (*)</label>
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="John">
                                <div class="validate"></div>

                                @if(old('register') != null)
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @endif

                            </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                            <label>Last Name (*)</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Doe">
                            <div class="validate"></div>

                            @if(old('register') != null)
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @endif

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Email Address (*)</label>
                        <input type="email" name="email" placeholder="info@example.com" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" id="email" autocomplete="email">
                        <div class="validate"></div>

                        @if(old('register') != null)
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @endif

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number (*)</label>
                        <input type="number" name="phone_number" value="{{ old('phone_number') }}" placeholder="293-86-5948">
                        <div class="validate"></div>
                        @if(old('register') != null)
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Home Address</label>
                <br>
                <input type="text" name="address" placeholder="3259 Nixon Avenue, New Hampshire" value="{{ old('address') }}">
            </div>

            <div class="row">
                <div class="col-md-6">
                 <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="North Salem">
                    <div class="validate"></div>

                    @if(old('register') != null)
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @endif

                </div> 
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>State</label>
                    <input type="text" name="state" value="{{ old('state') }}" placeholder="NH">
                    <div class="validate"></div>
                    @if(old('register') != null)
                    @error('state')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>ZIP</label>
                    <input type="text" name="zip" value="{{ old('zip') }}" placeholder="03073">
                    <div class="validate"></div>
                    @if(old('register') != null)
                    @error('zip')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Password (*)</label>
                    <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
                    <div class="validate"></div>

                    @if(old('register') != null)
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @endif

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label>Confirm Password (*)</label>
                  <input type="password" name="confirm_password" placeholder="Confirm Password">

              </div>
          </div>
      </div>


      <div class="login-redirections">
          <span>Already Registered?</span> <a href="signin" ><i class="la la-unlock"></i>Login</a>
      </div>

      <div class="form-group centered">
        <input type="submit" name="register" class="theme-btn btn-style-three mt-2" value="Register">
    </div>
</form>
</div>
<!--End Register Form -->
</div>
</div>
</div>
</section>
<!--End Register Section-->
@endsection