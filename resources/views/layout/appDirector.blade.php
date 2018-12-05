<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SGIPEC -@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- bootstrap  -->

{{--    <link rel=”stylesheet” href="{{asset('css/sweetalert.css')}}">--}}

    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/icon?family=Material+Icons')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('plugins/font-awesome/css/font-awesome.css')}}">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <link href="{{asset('plugins/waitme/waitMe.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('css/backend/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('css/backend/themes/all-themes.css')}}" rel="stylesheet" />

    @yield('css')
</head>

<body class="theme-red" style="background-color: white">
<!-- Page Loader -->
@include('elements.pageloader')
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
@include('elements.search')
<!-- #END# Search Bar -->
<!-- Top Bar -->
@include('elements.topbar')
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    @include('elements.leftsidebar')
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
     @include('elements.rightsidebar')
    <!-- #END# Right Sidebar -->
</section>
<section class="content">
    <div class="container-fluid">
        @yield('content')
    </div>
</section>

<!-- Jquery Core Js -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>

    <script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>

    <script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>

    <script src="{{asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>

    <script src="{{asset('plugins/multi-select/js/jquery.multi-select.js')}}"></script>

    <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>

    <script src="{{asset('plugins/autosize/autosize.js')}}"></script>

    <script src="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

    <script src="{{asset('plugins/jquery-steps/jquery.steps.js')}}"></script>
    <script src="{{asset('js/backend/pages/forms/form-wizard.js')}}"></script>

    <script src="{{asset('js/backend/admin.js')}}"></script>
    <script src="{{asset('js/backend/demo.js')}}"></script>

@yield('script')

</body>

</html>