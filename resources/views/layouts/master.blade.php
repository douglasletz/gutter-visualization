<!DOCTYPE html>
<html lang="en">


@include("partials.head")

<body>
  <button id="back-to-top-btn"><i class="la la-angle-double-up"></i></button>
  <div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>


@include("partials.navbar")

@yield("content")  

@include("partials.footer")

@yield("script")

</div>
<!--End pagewrapper-->

</body>

</html>