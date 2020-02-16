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
        @include('layout.menu')
        <div class="page-wrapper">
            @yield('content')
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
