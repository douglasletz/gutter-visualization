                <!DOCTYPE html>
                <html lang="en">

                @include("partials.admin.head")

                <body id="page-top">

                	<!-- Page Wrapper -->
                	<div id="wrapper">

                		<!-- Content Wrapper -->
                		<div id="content-wrapper" class="d-flex flex-column">

                			<!-- Main Content -->
                			<div id="content">

                				@yield("content")  

                			</div>
                			<!-- End of Main Content -->

                			@include("partials.admin.footer")

                		</div>
                		<!-- End of Content Wrapper -->

                	</div>
                	<!-- End of Page Wrapper -->

                	<!-- Scroll to Top Button-->
                	<a class="scroll-to-top rounded" href="#page-top">
                		<i class="fas fa-angle-up"></i>
                	</a>

                <!-- Bootstrap core JavaScript-->
                <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
                <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

                <!-- Core plugin JavaScript-->
                <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

                <!-- Custom scripts for all pages-->
                <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

                @yield("script")  



            </body>

            </html>