@section('sidebar')
@extends('admin.header')
@section('content')

<body id="page-top" class="d-flex flex-column min-vh-100">


    @if (session()->has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="false">&times;</span>
        </button>
        <strong>
            {!! session()->get('success') !!}
        </strong>
    </div>
@endif


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dash')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img alt="" src="{{ asset('/frontend/img/logo/logo.png') }}"
                    style="width: 70px;  height: 70px;margin: -18px;">
                </div>
                <div class="sidebar-brand-text mx-3">Mobile Mart</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dash')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('products.index')}}">
                    <i class="fas fa-mobile"></i>
                    <span>Product Management </span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('brands.index')}}">
                    <i class="fab fa-bandcamp"></i>
                    <span>Brand Management</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('order.index')}}">
                    <i class="fa fa-book"></i>
                    <span>Order Status</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('contact.index')}}">
                    <i class="fa fa-question"></i>
                    <span>Customer Queries</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('shipping.index')}}">
                    <i class="fa fa-truck"></i>
                    <span>Shipping Charges</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                @if(Auth::user()->image!='')
                                <img class="img-profile rounded-circle"
                                    src="{{asset('/profilePic'.'/'.Auth::user()->image)}}">
                                    @else
                                    <img class="img-profile rounded-circle"
                                    src="{{asset('/profilePic/dummy2.jpeg')}}">
                                    @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('admin.edit', Auth::user()->id)}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Edit Profile
                                </a>
                                <a class="dropdown-item" href="{{route('admin.change-password.view')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Change Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                @yield('main-content')



            <!-- Footer-->
                <footer class="sticky-footer bg-white mt-auto">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Mobile Mart 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

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
                        <a class="btn btn-primary" href="{{route('admin.logout')}}">Logout</a>
                    </div>
                </div>
                </div>
                </div>


                <script src="{{asset('/admin/vendor/jquery/jquery.min.js')}}"></script>
                <script src="{{asset('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

                <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                {{-- <script src="{{asset('/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script> --}}


                <script src="{{asset('/admin/js/sb-admin-2.min.js')}}"></script>

                {{-- <script src="{{asset('/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

                <script src="{{asset('/admin/vendor/chart.js/Chart.min.js')}}"></script>


                <script src="{{asset('/admin/js/demo/chart-area-demo.js')}}"></script>
                <script src="{{asset('/admin/js/demo/chart-pie-demo.js')}}"></script> --}}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/helpers.esm.min.js" integrity="sha512-urWBnIv+F027G24xDNigjxvIuwnWlWy94W2yx77VkISKLzKSohOKOubMDhtEF6LZcEH7gctmNSpxDqIW/zMmUg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.js" integrity="sha512-uLlukEfSLB7gWRBvzpDnLGvzNUluF19IDEdUoyGAtaO0MVSBsQ+g3qhLRL3GTVoEzKpc24rVT6X1Pr5fmsShBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

                <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

                @yield('scripts')


<script>
    CKEDITOR.replace('my-editor');
    </script>
    {{-- <script >
         $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD',
             icons:
        {
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down",
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'

        },
});
    </script> --}}
 </body>
@endsection
