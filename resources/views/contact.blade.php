@extends("layouts.master")


@section("title")
Contact | Rain Gutter Visualizer
@endsection


@section("content")
<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('/images/background/6.jpg') }});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <h1>Contact Us</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Contact Us</li>
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
<!-- Contact Section -->
<section class="contact-section style-two">
    <div class="auto-container">
        <div class="row">
            <!-- Form Column -->
            <div class="form-column col-lg-8 col-md-6 col-sm-12">
                <div class="inner-column">
                    <div class="title-box">
                        <h2>Please fill out the form below!</h2>
                        <!--  <div class="text">Don’t Hesitate to Contact with us for any kind of information</div> -->
                    </div>

                    <!-- Contact Form -->
                    <div class="contact-form">
                        <form method="post" action="{{route('contact')}}" id="contact-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject">
                                
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea name="message" value="{{ old('message') }}" placeholder="Massage"></textarea>
                                
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-three" type="submit" name="submit-form">Send Now</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>

            <!-- Info Column -->
            <div class="info-column col-lg-4 col-md-6 col-sm-12">
                <div class="inner-column">

                  <div class="title-box">
                    <h2>Contact Information</h2>                           
                </div>
                <div class="contact-info">
                 <div class="text">Don’t Hesitate to Contact with us.</div>
                 <!-- Info Box -->
                 <div class="contact-info-box">
                    <div class="inner-box">
                        <span class="icon la la-phone"></span>
                        <ul>
                            <li><a href="tel:88 867 56 453"> 88 867 56 453</a></li>
                            <li><a href="tel:21 535 42 546">21 535 42 546</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="contact-info-box">
                    <div class="inner-box">
                        <span class="icon la la-envelope-o"></span>
                        <ul>
                            <li><a href="mailto:info@example.com">info@example.com</a></li>
                            <li><a href="mailto:sale@example.com">sale@example.com</a> </li>
                        </ul>
                    </div>
                </div>

                <!-- Info Box -->
                <div class="contact-info-box">
                    <div class="inner-box">
                        <span class="icon la la-map-marker"></span>
                        <ul>
                            <li>The actuall address to be placed here</li>
                        </ul> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
</div>
</section>
<!--End Contact Section -->

@endsection