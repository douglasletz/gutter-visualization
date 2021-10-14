@extends("layouts.master")


@section("title")
Homepage | Rain Gutter Visualizer
@endsection


@section("content")
<!-- Property Search Section Two -->
<section class="property-search-section-two" style="background-image: url({{ asset('/images/background/2.jpg') }});">
  <div class="auto-container">
   <div class="content-box">
    <div class="title-box">
        <h4>Welcome to the</h4>
     <h2>Rain <span>Gutter</span> Visualizer</h2>
     
 </div>

   <div class="btns">
    <a href="project_gallery" class="theme-btn btn-style-three">select a sample home</a>
       <a href="project_new" class="theme-btn btn-style-three">upload your own home</a>
   </div>

</div>
</div>
</section>
<!--End Property Search Section Two -->    
@endsection