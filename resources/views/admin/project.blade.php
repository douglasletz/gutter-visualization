@extends("layouts.admin.master")


@section("title")
Users Project Page | Rain Gutter Visualizer
@endsection


@section("content")

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
<!-- ======= Saved Projects ======= -->
<section class="saved_projects">
  <div class="container">

    <div class="row">

      @foreach($projects as $item)
      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="{{route('admin_project_detail', $item->id)}}">
            <img src="{{ asset($item->path) }}" alt="" class="img-fluid">
          </a>
          <a href="#popup1" class="btn-delete btn-overlay btn-overlay--top btn-overlay--right removeProject" data-id="{{$item->id}}"><i class="la la-trash"></i></a>
        </div>
      </div>
      @endforeach

      @if(sizeof($projects)==0)
      You don't have any saved projects. 
      @endif

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
          <li class="invisible"><a href="#delete_project" data-toggle="tab">Delete Project</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content text-center">

         <div class="tab-pane active" id="delete_project">
           <h2>Confirm Deletion</h2>
          
           <div class="content">
            <p class="mt-2"> Are you sure?</p>
            <a href="" class="theme-btn btn-style-three mt-5" id="delete_link">Delete Project</a>
           </div>       
         </div>

       </div>

     </div>
   </div>
 </div>
</div>

@endsection

@section('script')
<script>
  $(".removeProject").on('click', function(){
    var url = "{{route('admin_project_delete')}}/"+$(this).data('id');
    $("#delete_link").attr('href', url)
  })
  
</script> 
@endsection