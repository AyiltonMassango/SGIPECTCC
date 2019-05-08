@php
    $fn = \App\Funcionario::query()->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->first();
    if($fn != null){
        $user_cat = \App\CategoriaFuncionario::query()->find($fn->categoria_funcionario_id)->designacao;
        $escola = \App\Escola::query()->find($fn->escola_id);
    }else{
    $user_cat = null;
    }

@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SGIPEC -@yield('title')</title>
    {{--<link rel="icon" href="favicon.ico" type="image/x-icon">--}}

    <link href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap2/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/waitme/waitMe.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/bootstrap-select2/dist/css/bootstrap-select.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('css/backend/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/backend/themes/all-themes.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/material-design-iconic-font/css/material-design-iconic-font.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/material.css')}}" rel="stylesheet" type="text/css">
    @yield('css')
</head>

@if($fn != null) {{--quando nao e admin--}}

    <body class="theme-{{$escola->cor_escola}}" style="background-color: white">

        @include('elements.pageloader')
        <div class="overlay"></div>
        @include('elements.topbar')
        <section>
            @if($user_cat == null)
                @include('elements.leftsidebar')
                @include('elements.rightsidebar')
            @elseif($user_cat == 'Director(a)-Geral')
                @include('elements.leftsidebarDirector')
            @elseif($user_cat == 'Secretario(a)')
                @include('elements.leftsidebarSecretario')
            @endif
        </section>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        @include('elements.js')

        <script>
            $(document).ready(function () {
                jQuery.extend(jQuery.validator.messages,{
                    required:'Campo Obrigatório.'
                });
            })
        </script>
        @yield('script')
    </body>
@else
    <body style="background-color: white">

        @include('elements.pageloader')
        <div class="overlay"></div>
        @include('elements.topbar')
        <section>
            @if($user_cat == null)
                @include('elements.leftsidebar')
                @include('elements.rightsidebar')
            @elseif($user_cat == 'Director(a)-Geral')
                @include('elements.leftsidebarDirector')
            @elseif($user_cat == 'Secretario(a)')
                @include('elements.leftsidebarSecretario')
            @endif
        </section>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        @include('elements.js')

        <script>
            $(document).ready(function () {

                $.ajaxSetup({
                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                });

                jQuery.extend(jQuery.validator.messages,{
                    required:'Campo Obrigatório.'
                });

                $('.right-sidebar .demo-choose-skin li').on('click', function () {
                    // alert($(this).data('theme')+" eer");
                    write_theme($(this).data('theme')); // escreve o tema no file(theme)
                });

                function read_theme() {
                    $.ajax({
                        url: '/read_theme',
                        type:'POST',
                        success: function (theme) {
                            $('body').addClass('theme-' + theme);
                            // alert('leu '+theme);
                        }
                    })
                }
                read_theme();

                function write_theme(tema) {
                    $.ajax({
                        url: '/write_theme',
                        type:'POST',
                        data:{'theme':tema},
                        success: function () {
                            // alert(tema);
                            read_theme();
                        }
                    })
                }
            })
        </script>
        @yield('script')
    </body>
@endif

</html>
