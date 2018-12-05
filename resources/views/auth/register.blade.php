@extends('layout.index')
@php
    $provincias = \App\Provincia::all();
@endphp
@section('css')
    <style>

    </style>
@endsection
@section('title')
    {{__('Criar Conta')}}
@endsection

@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2><i class="fa fa-pencil"></i>&nbsp;Criar Conta</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="wizard_horizontal">
                        <h2>Dados da escola</h2>
                        <section>
                            <form method="POST" id="formEscola" autocomplete="off">
                                <input type="file" style="display: none" id="inputFoto" accept="image/jpeg" name="inputFoto">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4 justify-content-center">
                                        <fieldset class="p-md-5" style="border: solid #adadad 1px">
                                            <legend><label for="inputFoto" style="width: 100%" class="btn btn-default"><i class="fa fa-photo green"></i>&nbsp;Anexa Logotipo</label></legend>
                                            <div class="center-align m-l-5 m-r-5 m-b-5" style="height: 150px;">
                                                <img id="fotoFinal" class="image" src="{{asset('images/backend/thumbs-up.png')}}" style="width: 100%; height: 100%">
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="row ">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="nome" id="escola" class="form-control">
                                                        <label class="form-label" for="escola">Nome</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="alvara" name="alvara_nr" class="form-control">
                                                        <label for="alvara" class="form-label">Alvará Nr.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="nuit" name="nuit" class="form-control">
                                                        <label for="nuit" class="form-label">Nuit</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="slogan" id="slogan" class="form-control">
                                                        <label for="slogan" class="form-label">Slogan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="telefone" name="nr_telefone" class="form-control">
                                                        <label for="telefone" class="form-label">Telefone Nr.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="telefone1" name="nr_alternativo" class="form-control">
                                                        <label for="telefone1" class="form-label">Telefone Alternativo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="email" name="email" class="form-control">
                                                        <label for="email" class="form-label">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="row pb-0 m-b-0 pl-md-5">--}}
                                    {{--<fieldset class="col-lg-12">--}}
                                        {{--<legend style="text-align: center">Endereço</legend>--}}
                                        <div class="row" id="divEscolaEnredeco">
                                            <div class="col-sm-4">
                                                <div class="form-group form-float" id="divPro">
                                                    <select class="form-control show-tick selectProvincia" data-combo="selectDistrito" size="3">
                                                        <option selected disabled>Selecine Provincia</option>
                                                        @foreach($provincias as $pro)
                                                            <option id="{{$pro->id}}" value="{{$pro->designacao}}">{{$pro->designacao}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <select class="form-control" id="selectDistrito">
                                                        <option selected disabled>Selecione Distrito</option>
                                                    </select>
                                                    <input name="distrito_id" id="distrito_id" type="hidden" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="bairro" name="bairro" class="form-control">
                                                        <label for="bairro" class="form-label">Bairro</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pb-0">
                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="avenidaRua" name="avenida_rua" class="form-control">
                                                        <label for="avenidaRua" class="form-label">Avenida/Rua</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="quartNr" name="quarteirao" class="form-control">
                                                        <label for="quartNr" class="form-label">Quarteirao Nr</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="CasaNr" name="nr_casa" class="form-control">
                                                        <label for="CasaNr" class="form-label">Casa Nr.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{--</fieldset>--}}
                                {{--</div>--}}
                            </form>
                        </section>

                        <h2>Funcionario</h2>
                        <section>
                            <form id="formDirector">
                                @include('funcionario.form')
                            </form>

                            <div class="form-group">
                                <button class="btn btn-success pull-left" id="btnSubmit"><i class="zmdi zmdi-save"></i>&nbsp;Salvar</button>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container hidden">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="emailLogin" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="passwordLogin" value="111111" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                </div>
                            </div>

                            <button id="submitLogin" type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#body').addClass('ls-closed');

            $('#inputFoto').on('change',function () {
                var img = document.getElementById("fotoFinal");
                loadFoto(this, img);
            });

            function loadFoto(file, img){ //funcao que exibe a imagem apos selecinar no file chooser
                if (file.files && file.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file.files[0]);
                }
            }

            function preencherDistrit(select,provinciaID) {
                $.ajax({
                    url: '/api/getDistritos',
                    type: 'POST',
                    data: {'provinciaID': provinciaID},
                    success: function (rs) {
                        $('.xx').remove();
                        for (var k = 0; k < rs.dados.length; k++) {
                            // $(select).append('<option class="xx" id="'+rs.dados[k].id+'"  value="' + rs.dados[k].designacao + '">' + rs.dados[k].designacao + '</option>');
                            $(select).append("<option class='xx' id='"+rs.dados[k].id+"'  " +
                                "value='" + rs.dados[k].designacao + "'>" + rs.dados[k].designacao + "</option>").selectpicker('refresh');
                        }
                    },
                    fail: function () {
                        alert('erro ao buscar distritos');
                    }
                });
            }
            function getId(i) {
                return i[i.selectedIndex].id;
            }
            $('.selectProvincia').on('change',function () {
                var comboDistrito = $(this).attr('data-combo');
                preencherDistrit('#'+comboDistrito,getId(this));
            });

            $('#selectDistrito').on('change',function () {
                document.getElementById('distrito_id').value = getId(this); // set i
            });
            $('#selectDistritoFunc').on('change',function () {
                document.getElementById('distrito_idFunc').value = getId(this); // set i
            });

            $('#btnSubmit').click(function () {
               $('#formEscola').trigger('submit');
            });

            $('#formEscola').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '/api/salvarEscola',
                    type: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false
                }).done(function (msg) { //retorna msg
                    if(msg == 'error'){
                        alert('Ja tem Escola com esse Nome');
                    }else{
                        document.getElementById('escola_id').value = msg;
                        $('#formDirector').trigger('submit');
                    }
                }).fail(function () {
                    alert('Erro ao salvar');
                });
            });

            $('#formDirector').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '/api/salvarFuncionario',
                    type: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false
                }).done(function (email) {
                    document.getElementById('emailLogin').value=email;
                    $('#submitLogin').trigger('click');
                }).fail(function () {
                    alert('Erro ao salvar Funcionario');
                });
            });
        });
    </script>
@endsection
