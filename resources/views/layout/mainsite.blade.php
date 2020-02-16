<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/assets/images/favicon.png')}}">
    <title>E-Office</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">    
    <!-- You can change the theme colors from here -->
    <link href="{{asset('admin/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('admin/css/alertify/alertify.min.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('admin/css/alertify/default.min.css')}}" id="theme" rel="stylesheet">
    
    @stack('custom-css')
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/custom.css')}}" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
        </svg>
    </div>
    <div id="main-wrapper">
        @include('layout.header')
        {{-- @include('layout.menu') --}}
        <div class="page-wrapper mrl-0">
            <div class="container-fluid">
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3 main_menu">
                        <a href="{{ route('supplier') }}" class="card card-inverse card-info">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="fa fa-cart-arrow-down m-r-10" aria-hidden="true"></i></h1>
                                <h6 class="text-white">Nhà cung cấp</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3 main_menu">
                        <a href="{{ route('supplier') }}" class="card card-inverse card-info">
                            <div class="box bg-houseware text-center">
                                <h1 class="font-light text-white"><i class="fa fa-university m-r-10" aria-hidden="true"></i></h1>
                                <h6 class="text-white">Kho</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3 main_menu">
                        <a href="{{ route('supplier') }}" class="card card-inverse card-info">
                            <div class="box bg-asset text-center">
                                <h1 class="font-light text-white"><i class="fa fa-cubes m-r-10" aria-hidden="true"></i></h1>
                                <h6 class="text-white">Tài sản</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3 main_menu">
                        <a href="{{ route('customer') }}" class="card card-inverse card-success">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="fa fa-address-card m-r-10" aria-hidden="true"></i></h1>
                                <h6 class="text-white">Khách hàng</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3 main_menu">
                        <a href="{{ route('projectview') }}" class="card card-inverse card-danger">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="fa fa-calendar-check-o m-r-10" aria-hidden="true"></i></h1>
                                <h6 class="text-white">Dự án</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3 main_menu">
                        <a href="{{ route('projectview') }}" class="card card-inverse card-danger">
                            <div class="box bg-tasks text-center">
                                <h1 class="font-light text-white"><i class="fa fa-calendar-check-o m-r-10" aria-hidden="true"></i></h1>
                                <h6 class="text-white">Công việc</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3 main_menu">
                        <a href="{{ route('projectview') }}" class="card card-inverse card-danger">
                            <div class="box bg-event text-center">
                                <h1 class="font-light text-white"><i class="fa fa-calendar-check-o m-r-10" aria-hidden="true"></i></h1>
                                <h6 class="text-white">Sự kiện</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3 main_menu">
                        <a href="{{ route('projectview') }}" class="card card-inverse card-danger">
                            <div class="box bg-email text-center">
                                <h1 class="font-light text-white"><i class="fa fa-calendar-check-o m-r-10" aria-hidden="true"></i></h1>
                                <h6 class="text-white">Email</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3 main_menu">
                        <a href="{{ route('employee') }}" class="card card-inverse card-primary">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white"><i class="fa fa-users m-r-10" aria-hidden="true"></i></h1>
                                <h6 class="text-white">Nhân sự</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3 main_menu">
                        <a href="{{ route('company') }}" class="card card-inverse card-purple">
                            <div class="box bg-grey text-center">
                                <h1 class="font-light text-white"><i class="fa fa-cog m-r-10" aria-hidden="true"></i></h1>
                                <h6 class="text-white">Cấu hình</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @include('layout.footer')
        </div>
    </div>

    <script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('admin/assets/plugins/bootstrap/js/tether.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('admin/js/waves.js')}}"></script>
    <script src="{{asset('admin/js/alertify.min.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('admin/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    {{-- <script src="{{asset('admin/js/custom.min.js')}}"></script> --}}
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="{{asset('admin/assets/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('admin/js/flot-data.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('admin/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    @stack('custom-scripts')
    <!--Custom JavaScript -->
    <script src="{{asset('admin/js/custom.js')}}"></script>
    <!-- ============================================================== -->
</body>

</html>
