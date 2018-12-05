<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SGIPEC -@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="{{url('https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext')}}" rel="stylesheet" type="text/css">
    <link href="{{url('https://fonts.googleapis.com/icon?family=Material+Icons')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('plugins/font-awesome/css/font-awesome.css')}}">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet"/>

{{--    <link href="{{asset('plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />--}}
    <link href="{{asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />


    <link href="{{asset('plugins/waitme/waitMe.css')}}" rel="stylesheet"/>

    <!-- Morris Chart Css-->
    {{--<link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet"/>--}}

    <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet"/>


    <!-- Custom Css -->
    <link href="{{asset('css/backend/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('css/backend/themes/all-themes.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/material-design-iconic-font/css/material-design-iconic-font.css')}}" rel="stylesheet"/>

    @yield('css')
</head>

<body class="theme-black" id="body">
    @include('elements.pageloader')

    <section>
        @include('auth.elements.leftsidebar')
    </section>
    <section class="content">
        <div class="container-fluid m-r-125 m-l-125 m-t--80">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                @yield('content')
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>

<!-- Jquery Core Js -->

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Core Js -->

    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <script src="{{asset('plugins/jquery-validation/jquery.validate.js')}}"></script>

    <script src="{{asset('plugins/jquery-steps/jquery.steps.js')}}"></script>

    <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>

    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>


    {{--<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>--}}

{{--<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>--}}

{{--<script src="{{asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>--}}

{{--<script src="{{asset('plugins/multi-select/js/jquery.multi-select.js')}}"></script>--}}

{{--<script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>--}}


    <script src="{{asset('plugins/autosize/autosize.js')}}"></script>

    <script src="{{asset('plugins/momentjs/moment.js')}}"></script>

    <script src="{{asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

    {{--<script src="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>--}}
    <script src="{{asset('js/backend/pages/forms/form-wizard.js')}}"></script>

    <script src="{{asset('js/backend/admin.js')}}"></script>
    <script src="{{asset('js/backend/pages/forms/basic-form-elements.js')}}"></script>

    <script src="{{asset('js/backend/demo.js')}}"></script>

@yield('script')

</body>

</html>