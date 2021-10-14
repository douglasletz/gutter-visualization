@extends("layouts.master")


@section("title")
Project Details | Rain Gutter Visualizer
@endsection


@section("content")
<!--Page Title-->

<div class="lds-dual-ring" id="lds-dual-ring" style="display: none;"></div>

<section class="page-title" style="background-image:url({{ asset('/images/background/6.jpg') }});">    
</section>
<!--End Page Title-->
<!--Page Title-->
<section class="top-bar">
  <!-- Main Header-->
  <header class="main-header header-style" style="z-index: auto !important;">
    <!--Header Top-->
    <div class="header-top">
      <div class="auto-container">
        <div class="inner-container clearfix">
          <div class="top-right" style="display: flex; justify-content: center;">
            <ul class="contact-list clearfix box">

              @if(isset($is_project ))
              <li><a href="#" onclick="$('#project_create').submit()"><i class="la la-save"></i>Save</a></li>
              @else
              <li><a href="#popup1"><i class="la la-save"></i>Save</a></li>
              @endif
            </ul>
          </div>

        </div>
      </div>
    </div>
    <!-- End Header Top -->

  </header>
  <!--End Main Header -->   
</section>
<!--End Page Title-->

<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-4 col-md-4">

       <div class="section-title pt-5">
        <h5>Choose a Color</h5>
        <p>Choose a color to apply to the selected feature.</p>
      </div>

      <div class="colors-gallery-item">

        <ul>
          @if(isset($gallery->gallery_shades))
          @foreach($gallery->gallery_shades as $gallery_shade)
          <li>
            <img src="{{ asset($gallery_shade->shade_path) }}" alt="" class="img-fluid" onclick="change_img('{{asset($gallery_shade->shaded_path)}}')">
            <p>{{($gallery_shade->color_name)}}</p>
          </li>
          @endforeach
          @else
          <li>
            <img src="{{ asset('/images/gallery/antique-ivory.jpg') }}" alt="" class="img-fluid">
          </li>
          <li>
            <img src="{{ asset('/images/gallery/wicker.jpg') }}" alt="" class="img-fluid">
           
          </li>
          <li>
            <img src="{{ asset('/images/gallery/clay.jpg') }}" alt="" class="img-fluid">
             <p>Clay</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/royal_brown.jpg') }}" alt="" class="img-fluid">
            <p>Royal Brown</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/bronze.jpg') }}" alt="" class="img-fluid">
            <p>Bronze</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/scotch_red.jpg') }}" alt="" class="img-fluid">
            <p>Scotch Red</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/pearl_gray.jpg') }}" alt="" class="img-fluid">
            <p>Pearl Gray</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/dove_gray.jpg') }}" alt="" class="img-fluid">
            <p>Dove Gray</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/black.jpg') }}" alt="" class="img-fluid">
            <p>Black</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/blue.jpg') }}" alt="" class="img-fluid">
            <p>Blue</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/grecian_green.jpg') }}" alt="" class="img-fluid">
            <p>Grecian Green</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/musket_brown.jpg') }}" alt="" class="img-fluid">
            <p>Musket Brown</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/white_higloss.jpg') }}" alt="" class="img-fluid">
            <p>White Hi Gloss</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/eggshell.jpg') }}" alt="" class="img-fluid">
            <p>Eggshell</p>
          </li>
          <li>
            <img src="{{ asset('/images/gallery/classic_cream.jpg') }}" alt="" class="img-fluid">
            <p>Classic Cream</p>
          </li>
          @endif
        </ul>
      </div>
    </div>

    <div class="col-lg-8 col-md-8">
      <div class="imageBox">
       <!-- @if($gallery->flag == 1)
        1
        @endif -->
          <img src="{{ asset($gallery->path) }}" alt="" class="img-fluid w-100" id="display_img">
     
          <img src="{{ asset($gallery->hover) }}" alt="" class="img-fluid hoverImg w-100">
       
      </div>
      

    </div>

  </div>

</div>
</section><!-- End Gallery Section -->

<div id="popup1" class="overlay">
  <div class="popup">
    <a class="close" href="#">×</a>
    <div class="content">
     <div class="row">
      <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="login_register nav nav-tabs">
          <li class="invisible"><a href="#save_project" data-toggle="tab">Save Project</a></li>
          <li class="invisible"><a href="#Login" id="login" data-toggle="tab">Login</a></li>
          <li class="invisible"><a href="#Registration" class="" data-toggle="tab">Registration</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">

         <div class="tab-pane active" id="save_project">
          <div class="login-form register-form">
            <!--Save Project Form-->
            <form  method="POST" action="{{route('project_create')}}" id="project_create">
              @csrf
              <div class="form-group">
                <label>What should we name your project?</label>
                <input type="text" name="project_name" placeholder="Enter Project Name" value="{{$gallery->name}}" required>
                @error('project_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="hidden" name="project_image" id="project_image" value="{{$gallery->path}}">
                <input type="hidden" name="gallery_id" id="gallery_id" value="{{$gallery->id}}">

                @if(isset($is_project))
                <input type="hidden" name="id" value="{{$gallery->id}}">
                @endif
              </div>

              <div class="form-group centered">
                <input class="theme-btn btn-style-three mt-2" type="submit" onclick="save_project(event)" value="Save Project">
              </div>

            </form>
          </div>
          <!--End Save Projects Form -->
        </div>
           <div class="tab-pane" id="Login">

          <div class="login-form register-form">
            <!--Login Form-->
            <form  method="POST" action="{{ route('login') }}" id="login_form">
              @csrf
              <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Your Email Address" >
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
                <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Enter Your Password">


                @if(old('login') != null)
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
                @endif

              </div>

              <div class="login-redirections">
                <a href="#Registration" class="" data-toggle="tab" class="float-left"><i class="la la-unlock"></i> Create An Account</a>

                <a href="{{route('forgot_password')}}" class="float-right"><i class="la la-unlock-alt"></i> Forgot Password?</a>  
              </div>

              <div class="form-group centered">
                <input class="theme-btn btn-style-three mt-2" type="submit" id="login-btn" name="login" value="LOGIN">
              </div>

            </form>
          </div>
          <!--End Login Form -->
        </div>
        <div class="tab-pane" id="Registration">

         <!-- Register Form -->
         <div class="login-form register-form">
          <div id="error_div_popup" class="alert-danger"></div>
          <form method="POST" action="{{ route('register') }}" id="register_form">

            @csrf
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Enter Your Username">
              <div class="validate"></div>

              @if(old('register') != null)
              @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              @endif

            </div>

            <div class="form-group">
              <label>Email Address</label>
              <input type="email" name="email" placeholder="Enter Your Email Address" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" id="email" autocomplete="email">
              <div class="validate"></div>

              @if(old('register') != null)
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              @endif
            </div>


            <div class="form-group">
              <label>Phone Number</label>
              <input type="number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Enter Your Phone Number">
              <div class="validate"></div>
              @if(old('register') != null)
              @error('phone_number')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              @endif

            </div>

            <div class="form-group">
              <label>Home Address</label>
              <br>
              <textarea name="address" placeholder="Enter Your Home Address">{{ old('address') }}</textarea>
            </div>


            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" id="password" placeholder="Enter Your Password" value="{{ old('password') }}">
              <div class="validate"></div>

              @if(old('register') != null)
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              @endif

            </div>

            <div class="form-group">
              <label>Confirm Your Password</label>
              <input type="password" name="confirm_password" placeholder="Confirm Password">

            </div>

            <div class="login-redirections">
              <span>Already Registered?</span> <a href="#Login" class="" data-toggle="tab" ><i class="la la-unlock"></i>Login</a>
            </div>

            <div class="form-group centered">
              <input type="submit" name="register" id="register-btn" class="theme-btn btn-style-three mt-2" value="Register">
            </div>
          </form>
        </div>
        <!--End Register Form -->
      </div>
    </div>

  </div>

</div>
</div>
</div>
</div>
@endsection

@section('script')

<script type="text/javascript">
  $("#login-btn").on('click', function(event){
    event.preventDefault();
    $.post("{{ route('login') }}", $('#login_form').serialize(), function( data ) {
      if(data.status){
        alert(data.msg)
        $("#project_create").submit()
      }else{
        alert(data.msg)
      }
    })
  })
  
  
  // $("#register-btn").on('click', function(event){
  //   event.preventDefault();
  //   $.post("{{ route('register') }}", $('#register_form').serialize(), function( data ) {
  //     if(data.status){
  //       alert(data.msg)
  //       $("#project_create").submit()
  //     }else{
  //       alert(data.msg)
  //     }
  //   })
  // })

  $("#register-btn").on('click', function (event) {
            event.preventDefault();
            $.post("{{ route('register') }}", $('#register_form').serialize(), function (data) {
                // alert(data)
                if (data.status) {
                    $("#project_create").submit()
                } else {
                    alert(data.msg)
                }
            }).fail(function(error) {
                var errors = error.responseJSON.errors;
                var error_text = '<ul>';

                $.each(errors, function (i, d) {
                    error_text += '<li><strong>'+i+'</strong><p>'+(d[0])+'</p></li>'
                })
                error_text += '</ul>'
                $("#error_div_popup").html(error_text)
                $("#username").focus()
            });
        })
  
  function save_project(event) {
    @if (auth()->user()) 

    @else
    event.preventDefault();
    $('#login').trigger('click')
    @endif
  }
  function change_img(url){
    $("#lds-dual-ring").css('display', '');
    document. getElementById("display_img").src = url;
    $("#project_image").val(url.replace("/public", ""))
 }
 $("#display_img").on('load', function () {
    $("#lds-dual-ring").css('display', 'none');
 })

</script>
@endsection