@extends("layouts.master")


@section("title")
Select a Sample Home | Rain Gutter Visualizer
@endsection

@section("content")


<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('/images/background/6.jpg') }});">
  <div class="auto-container">
    <div class="inner-container clearfix">
      <h1>Select Sample Home</h1>
      <ul class="bread-crumb clearfix">
        <li><a href="/">Home</a></li>
        <li>Select Sample Home</li>
      </ul>
    </div>
  </div>


</section>
<!--End Page Title-->


<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
  <div class="container">

    <div class="section-title">
      <h2>Customize One Of Our Sample Homes</h2>
    </div>

    <div class="row no-gutters">

      @foreach($gallery as $item)
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="{{route('gallery_details', $item->id)}}">
            <img src="{{ asset($item->path) }}" alt="" class="img-fluid">
          </a>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section><!-- End Gallery Section -->
@endsection