                <!DOCTYPE html>
                <html lang="en">

                @include("partials.admin.head")

                <body id="page-top">

                    <!-- Page Wrapper -->
                    <div id="wrapper">

                        @include("partials.admin.sidebar")

                        <!-- Content Wrapper -->
                        <div id="content-wrapper" class="d-flex flex-column">

                            <!-- Main Content -->
                            <div id="content">

                                @include("partials.admin.navbar")

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

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
                <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

                <!-- Core plugin JavaScript-->
                <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

                <!-- Custom scripts for all pages-->
                <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

                <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('js/datatables/dataTables.bootstrap4.min.js') }}"></script>
                <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

                @yield("script")



            </body>

            </html>
