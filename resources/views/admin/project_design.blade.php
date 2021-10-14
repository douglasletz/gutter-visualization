@extends("layouts.admin.master")


@section("title")
Admin Project Details | Rain Gutter Visualizer
@endsection

@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    body {
        margin: 0px;
    }

    #myCanvas {
        margin: 0px;
    }

</style>
<div class="lds-dual-ring" id="lds-dual-ring" style="display: none;"></div>

<!--Page Title-->
<section class="top-bar">

    <header class="main-header header-style" style="z-index: auto !important;">

        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="top-right" style="display: flex; justify-content: center;">
                        <ul class="contact-list clearfix box">

                            @if(isset($is_project ))
                            <li><a href="" onclick="submit_form(event)"><i class="la la-save"></i>Save</a></li>
                            @else
                            <li><a href="#popup1"><i class="la la-save"></i>Save</a></li>
                            @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>


    </header>

</section>

<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">

    <body onload="load()">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-4 col-md-4">

                    <div class="section-title pt-5">
                        <h5>Choose a Color</h5>
                        <p>Choose a color to apply to the selected feature.</p>
                    </div>
                    @if(isset($is_project))
                    <input type="hidden" name="id" value="{{$gallery->id}}">
                    @endif

                    <div class="colors-gallery-item">

                        <ul>
                            <li>
                                <img src="{{ asset('/images/gallery/antique-ivory.jpg') }}" id="c1" alt=""
                                class="img-fluid">
                                <p>Antique Ivory</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/wicker.jpg') }}" id="c2" alt="" class="img-fluid">
                                 <p>Wicker</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/clay.jpg') }}" alt="" id="c3" class="img-fluid">
                                 <p>Clay</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/royal_brown.jpg') }}" id="c4" alt=""
                                class="img-fluid">
                                 <p>Royal Brown</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/bronze.jpg') }}" id="c5" alt="" class="img-fluid">
                                 <p>Bronze</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/scotch_red.jpg') }}" id="c6" alt=""
                                class="img-fluid">
                                 <p>Scotch Red</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/pearl_gray.jpg') }}" id="c7" alt=""
                                class="img-fluid">
                                <p>Pearl Gray</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/dove_gray.jpg') }}" id="c8" alt=""
                                class="img-fluid">
                                <p>Dove Gray</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/black.jpg') }}" id="c9" alt="" class="img-fluid">
                                <p>Black</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/blue.jpg') }}" id="c10" alt="" class="img-fluid">
                                <p>Blue</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/grecian_green.jpg') }}" id="c11" alt=""
                                class="img-fluid">
                                 <p>Grecian Green</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/musket_brown.jpg') }}" id="c12" alt=""
                                class="img-fluid redraw">
                                 <p>Musket Brown</p>
                            </li>
                             <li>
                                <img src="{{ asset('/images/gallery/white_higloss.jpg') }}" id="c13" alt=""
                                class="img-fluid redraw">
                                <p>White Hi Gloss</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/eggshell.jpg') }}" id="c14" alt=""
                                class="img-fluid redraw">
                                <p>Eggshell</p>
                            </li>
                            <li>
                                <img src="{{ asset('/images/gallery/classic_cream.jpg') }}" id="c15" alt=""
                                class="img-fluid redraw">
                                <p>Classic Cream</p>
                            </li>
                        </ul>

                        <div class="pallate-footer-buttons">

                            <input type="checkbox" id="chk" checked>Mark to draw a line

                            <button id="clear" class="theme-btn btn-style-three right">Clear</button>

                            <p class="mt-2">Use right click to stop marking!</p>


                            <!-- <input type="color" id="clr" name="color" value="#e66465">-->

                            <div id="canvas_image"></div>
                            <!-- <div id="postimage">
                                <input type="submit" id="upload" name="submit_image" value="Upload">
                                <div id="result"></div>
                            </div> -->
                        </div>

                    </div>
                </div>

            <!-- <div class="col-lg-8 col-md-8">
      <div class="imageBox">

          <img src="{{ asset($gallery->path) }}" alt="" class="img-fluid w-100" id="display_img">

          <img src="{{ asset($gallery->hover) }}" alt="" class="img-fluid hoverImg w-100">

      </div>


  </div> -->

  <div class="col-lg-8 col-md-8">
    <img id="img1" src="{{ asset($gallery->path) }}" hidden>
    <input type="text" value="{{$gallery->name}}" id="p_name" hidden/>


    <div id="myCanvas"></div>
</div>

</div>
</div>
</body>
</section>
<!-- End Gallery Section -->

<div id="popup1" class="overlay">
    <div class="popup">
        <a class="close" href="#">×</a>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <ul class="login_register nav nav-tabs">
                        <li class="invisible"><button href="#login_tab" id="login_tab_btn" data-toggle="tab">Login</button></li>
                        <li class="invisible"><a href="#registration" class="" data-toggle="tab">Registration</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div class="tab-pane active" id="save_project">
                            <div class="login-form register-form">
                                <!--Save Project Form-->
                                <form method="POST" action="{{route('admin_upload_project')}}" id="project_create">
                                    @csrf
                                    <div class="form-group">
                                        <label>What should we name your project?</label>
                                        <input type="text" name="project_name" placeholder="Enter Project Name"
                                        value="{{$gallery->name}}" required>
                                        @error('project_name')
                                        <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                       @enderror
                                       <input type="hidden" name="project_image" id="project_image"
                                       value="{{$gallery->path}}">

                                       <input type="hidden" name="image_base64" id="image_base64">
                                        <input type="hidden" name="user_id" value="{{$gallery->user_id}}">

                                       @if(isset($is_project))
                                       <input type="hidden" name="p_id" value="{{$gallery->id}}">
                                       @endif
                                   </div>

                                   <div class="form-group centered">
                                    <input class="theme-btn btn-style-three mt-2" type="submit" id="popup_click"
                                    onclick="save_project(event)" value="Save Project">
                                </div>

                            </form>
                        </div>
                        <!--End Save Projects Form -->
                    </div>

                    <div class="tab-pane" id="login_tab">

                        <div class="login-form register-form">
                            <!--Login Form-->
                            <form method="POST" action="{{ route('login') }}" id="login_form">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    placeholder="Enter Your Email Address">
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
                                <input type="password" name="password" id="password"
                                value="{{ old('password') }}" placeholder="Enter Your Password">


                                @if(old('login') != null)
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                               @enderror
                               @endif

                           </div>

                           <div class="login-redirections">
                            <a href="#Registration" class="" data-toggle="tab" class="float-left"><i
                                class="la la-unlock"></i> Create An Account</a>

                                <a href="{{route('forgot_password')}}" class="float-right"><i
                                    class="la la-unlock-alt"></i> Forgot Password?</a>
                                </div>

                                <div class="form-group centered">
                                    <input class="theme-btn btn-style-three mt-2" type="submit" id="login-btn"
                                    name="login" value="LOGIN">
                                </div>

                            </form>
                        </div>
                        <!--End Login Form -->
                    </div>
                    <div class="tab-pane" id="Registration">
                     <div id="error_div_popup" class="alert-danger"></div>
                     <!-- Register Form -->
                     <div class="login-form register-form">

                        <form method="POST" action="{{ route('register') }}" id="register_form">

                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" id="username"
                                value="{{ old('username') }}" placeholder="Enter Your Username">
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
                            <input type="email" name="email" placeholder="Enter Your Email Address"
                            value="{{ old('email') }}"
                            class="@error('email') is-invalid @enderror" id="email"
                            autocomplete="email">
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
                        <input type="number" name="phone_number" value="{{ old('phone_number') }}"
                        placeholder="Enter Your Phone Number">
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
                    <textarea name="address"
                    placeholder="Enter Your Home Address">{{ old('address') }}</textarea>
                </div>


                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password"
                    placeholder="Enter Your Password" value="{{ old('password') }}">
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
                <input type="password" name="confirm_password"
                placeholder="Confirm Password">

            </div>

            <div class="login-redirections">
                <span>Already Registered?</span> <a href="#Login" class=""
                data-toggle="tab"><i
                class="la la-unlock"></i>Login</a>
            </div>

            <div class="form-group centered">
                <input type="submit" name="register" id="register-btn"
                class="theme-btn btn-style-three mt-2" value="Register">
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


<!-- </body> -->
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>

    $("#login-btn").on('click', function (event) {
            event.preventDefault();
            $.post("{{ route('login') }}", $('#login_form').serialize(), function( data ) {
                if(data.status){
                    alert(data.msg)
                    $("#project_create").submit()
                }else{
                    alert(data.msg)
                }
            })
        });


    var clicks = [{}];
    var n_clicls = 0;
    var opacity = 0.8;
    var lineWidth = 1;
    var checkBoxChecked = false;



        function submit_form(event){
            event.preventDefault()
            $('#popup_click').trigger('click')
        }

        function save_project(event) {

            @if (auth()->user())

            @else
            event.preventDefault();
            $("#login_tab_btn").trigger('click')
            @endif

            // event.preventDefault();
            let pnGImage = convertCanvasToImage();
            var data = new FormData();


            let canvas = document.getElementById('canvas');
            let name = $('#p_name').val();

            $("#image_base64").val(canvas.toDataURL())

            // data.append('file', canvas.toDataURL());
            // data.append('name', name);

//                      $.ajaxSetup({
//                          headers: {
//                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                          }
//                      });

//                      $.ajax({
//                          url: "{{route('upload_project')}}",
//                          data: data,
//                          processData: false,
//                          contentType: false,
//                          type: 'POST',
//                          success: function(data){
//                              $( "#result" ).html( data );
//                          }
//                      });


}

    function convertCanvasToImage() {
        let canvas = document.getElementById('canvas');
        let image = new Image();
        image.crossOrigin = "Anonymous";
        image.src = canvas.toDataURL();
        return image;
    }

    function load()
    {
                    // console.log('exec');
                    const c = document.createElement("CANVAS");
                    const cxt = c.getContext("2d");
                    var start = 0;
                    c.id='canvas';
                    var img=document.getElementById('img1');

                    // c.width=window.innerWidth;
                    // c.height=window.innerHeight;
                    if ( ($(window).width() > 547) && ($(window).width() < 768)  ) {
                        c.width = window.innerWidth * .85;
                        c.height = window.innerHeight;

                    }

                    else if ( ($(window).width() > 768) && ($(window).width() < 2561)  ) {
                        c.width = window.innerWidth * .60;
                        c.height = window.innerHeight;

                    }

                    else if ( $(window).width() < 547 ) {
                        c.width = window.innerWidth;
                        c.height = "350";

                    }

                    document.getElementById('myCanvas').appendChild(c);
                    var checkBoxChecked = document.getElementById("chk");
                    c.style.backgroundImage = 'url(' + img.src + ')';
                    c.style.backgroundRepeat = 'no-repeat';
                    c.style.backgroundSize = '100% 100%';
                    cxt.drawImage(img, 0, 0,c.width,c.height);
                    /*var point2 = new Array();
                    point2['x'] = false;
                    point2['y'] = false;*/
                    let startPosition = {x: 0, y: 0};
                    let lineCoordinates = {x: 0, y: 0};
                    let isDrawStart = false;

                    const getClientOffset = (event) => {
                        const {offsetX, offsetY} = event.touches ? event.touches[0] : event;
                        const x = offsetX;
                        const y = offsetY;

                        return {
                         x,
                         y
                     }
                 }


                 const reDesign = () => {
                    if(checkBoxChecked.checked==true)
                    {
                        for(i = 0; i < clicks.length; i++){



                            cxt.lineWidth = 1;
                            cxt.lineTo(clicks[i].x, clicks[i].y);
                            cxt.strokeStyle='purple';
                            cxt.stroke();

                            //cxt.lineTo(clicks[i].x, clicks[i].y);


                        }
                        console.log('reDesign')
                    }
                }

                const saveDesign = (event) => {
                    const pos = getClientOffset(event);
                    clicks[n_clicls] = {'x': pos.x, 'y': pos.y}
                    n_clicls++;
                    console.log('saveDesign')
                }

                const drawLine = () => {
                    if(checkBoxChecked.checked === true) {
                     if(startPosition.x > 0 && startPosition.y > 0){
                         cxt.beginPath();
                         cxt.moveTo(startPosition.x, startPosition.y);
                         cxt.lineWidth = 2;
                         cxt.lineTo(lineCoordinates.x, lineCoordinates.y);
                         cxt.strokeStyle='purple';
                         cxt.stroke();
                     }
                 }
                 else{
                    console.log("Cannot Draw");
                }
            }
            const fclickListener = (event) => {
             startPosition = getClientOffset(event);
             isDrawStart = true;
         }

         const mouseMoveListener = (event) => {
            if(!isDrawStart) return;
            lineCoordinates = getClientOffset(event);
            clearCanvas();
            drawLine();
            console.log(1)
            reDesign()
        }
        var n_click=0;
        const sclickListener = (event) => {
            saveDesign(event)
                        //isDrawStart = false;
                    }

                    const stopDrawing = (event) => {
                        isDrawStart = false;
                    }

                    const clearCanvas = () => {
                     cxt.clearRect(0, 0, c.width, c.height);
                     cxt.drawImage(img, 0, 0,c.width,c.height);
                 }



                 const fillColor = (color) => {
                    clearCanvas()
                    reDesign()

                    cxt.fillStyle = color;
                    cxt.globalAlpha = opacity;
                    cxt.fill();
                }

                c.addEventListener('click', fclickListener);
                c.addEventListener('mousemove', mouseMoveListener);
                c.addEventListener('click', sclickListener);

                c.addEventListener('touchstart', fclickListener);
                c.addEventListener('touchmove', mouseMoveListener);
                c.addEventListener('touchend', sclickListener);

                c.addEventListener('contextmenu', e => {
                  e.preventDefault();
                  isDrawStart = false;
              });

                $("#c1").click(function(e){
                    fillColor('#d0bc9c')
                });

                $("#c2").click(function(e){
                    fillColor('#9e8e6c')
                });
                $("#c3").click(function(e){
                    fillColor('#816e46')
                });
                $("#c4").click(function(e){
                    fillColor('#361e12')
                });
                $("#c5").click(function(e){
                    fillColor('#3a302e')
                });
                $("#c6").click(function(e){
                    fillColor('#b8483d')
                });
                $("#c7").click(function(e){
                    fillColor('#cbcec5')
                });
                $("#c8").click(function(e){
                    fillColor('#d0bc9c')
                });
                $("#c9").click(function(e){
                    fillColor('#000')
                });
                $("#c10").click(function(e){
                    fillColor('#525f68')
                });
                $("#c11").click(function(e){
                    fillColor('#33443a')
                });
                $("#c12").click(function(e){
                    fillColor('#41342b')
                });
                $("#c13").click(function(e){
                    fillColor('#fffdfa')
                });
                $("#c14").click(function(e){
                    fillColor('#f0ead6')
                });
                $("#c15").click(function(e){
                    fillColor('#ede4d3')
                });



                var n_click=0;
                $("#clear").click(function(e){

                    n_click++;
                    if (n_click < 2) {
                        clicks=[""];
                        cxt.clearRect(0, 0, c.width, c.height);
                        c.remove();
                        load();
                        n_clicls=0;
                    }


                });

                $("#cnvrt").click(function(e){
                    let pnGImage = convertCanvasToImage();
                    document.getElementById('canvas_image').appendChild(pnGImage);
                });

                $("#upload").click(function(e){
                    e.preventDefault();
                    let pnGImage = convertCanvasToImage();
                    var data = new FormData();


                    let canvas = document.getElementById('canvas');


                    data.append('file', canvas.toDataURL());


                    $.ajax({
                        url: 'getdata.php',
                        data: data,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function(data){
                            $( "#result" ).html( data );
                        }
                    });
                });

            }

        </script>

        @endsection
