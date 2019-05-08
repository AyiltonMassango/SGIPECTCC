@extends('layout.app')
@section('title')Inscrição @endsection
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body pb-0">
                    <form id="wizard_with_validation" autocomplete="off" method="POST" action="{{url('/salvarInscricao')}}">
                        @csrf
                        {{--<div id="wizard_horizontal">--}}
                            <h3>Dados Pessoais</h3>
                            <fieldset>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="">
                                                <fieldset class="pt-1 p-2" style="border: solid #adadad 1px; border-radius: 5px">
                                                    <legend>
                                                        <button type="button" id="btn-webCam" class="w-100 btn btn-primary">
                                                            <i class="material-icons">add_a_photo</i>
                                                            <span>Webcam</span>
                                                        </button>
                                                    </legend>
                                                    <div class="row justify-content-center" style="height: 120px;">
                                                        <img id="fotoFinal" class="image" src="{{asset('images/backend/person.png')}}" style="height: 100%; border-radius: 5px">
                                                    </div>
                                                </fieldset>
                                                <fieldset class="p-l-15" style="border: solid #adadad 1px; border-radius: 5px;  height: 70px">
                                                    <legend class="btn btn-default">Sexo</legend>
                                                    <div class="row justify-content-center">
                                                        <input name="sexo" value="Feminino" type="radio" id="radio_1" checked />
                                                        <label class="mr-4" for="radio_1">Feminino</label>
                                                        <input name="sexo" value="Masculino" type="radio" id="radio_2" />
                                                        <label for="radio_2">Masculino</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="apelido" id="apelido" class="form-control" required>
                                                            <label class="form-label" for="apelido">Apelido</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="nome" name="nome" class="form-control" required>
                                                        <label for="nome" class="form-label">Nome</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 pt-3">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" value="{{date('Y-m-d')}}" name="data_nascimento" id="data_nascimento" class="datepicker form-control data">
                                                            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="estado_civil" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Estado Civil</label>
                                                    <select title="" name="estado_civil" class="form-control-file" style="width: 100%">
                                                        <option value="Solteiro(a)">Solteiro(a)</option>
                                                        <option value="Casado(a)">Casado(a)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" id="nacionalidade" name="nacionalidade" class="form-control" required>
                                                            <label for="nacionalidade" class="form-label">Nacionalidade</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" id="naturalidade" name="naturalidade" class="form-control">
                                                            <label for="naturalidade" class="form-label">Naturalidade</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" id="profissao" name="profissao" class="form-control">
                                                            <label for="profissao" class="form-label">Profissao</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" id="local_trabalho" name="local_trabalho" class="form-control">
                                                            <label for="local_trabalho" class="form-label">Local de trabalho</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-sm-4">
                                            <label for="nivel_academico" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Nivel academico</label>
                                            <select title="" id="nivel_academico" name="nivel_academico" class="form-control-file" style="width: 100%">
                                                <option selected value="Básico">Básico</option>
                                                <option value="Médio">Médio</option>
                                                <option value="Superior">Superior</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="tipoDocumento" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Tipo de Documento</label>
                                            <select title="" name="tipoDocumento" id="tipoDocumento" class="form-control-file"  style="width: 100%">
                                                <option selected value="BI">BI</option>
                                                <option value="Passaport">Passaport</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 pt-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" id="nr_documento" name="nr_documento" class="form-control">
                                                    <label for="nr_documento" class="form-label">Numero do Documento</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" value="{{date('Y-m-d')}}" id="data_emissao" name="data_emissao" class="datepicker form-control data">
                                                    <label for="data_emissao" class="form-label">Data Emissao</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" value="{{date('Y-m-d')}}" id="data_validade" name="data_validade" class="datepicker form-control data">
                                                    <label for="data_validade" class="form-label">Data De Validade</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" id="local_emissao" name="local_emissao" class="form-control">
                                                    <label for="local_emissao" class="form-label">Local de Emissao</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 mb-0">
                                            <div class="form-group form-float mb-0">
                                                <div class="form-line mb-0">
                                                    <input type="text" id="nome_pai" name="nome_pai" class="form-control">
                                                    <label for="nome_pai" class="form-label">Nome do pai</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-0">
                                            <div class="form-group form-float mb-0">
                                                <div class="form-line mb-0">
                                                    <input type="text" id="nome_mae" name="nome_mae" class="form-control">
                                                    <label for="nome_mae" class="form-label">Nome da mãe</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h3>Outros Dados</h3>
                            <fieldset>
                                <fieldset class="col-lg-12" style="border: solid #adadad 1px; border-radius: 5px">
                                    <legend class="text-left mb-0"><label style="background-color: #009688; color: white; font-size: 14px" class="btn btn-dark waves-effect">Contacto e Endereço</label></legend>
                                    <hr class="mt-0">
                                    <div class="row pb-0">
                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="nr_telefone" name="nr_telefone" class="form-control">
                                                        <label for="nr_telefone" class="form-label">Nr de Telefone</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="nr_alternativo" name="nr_alternativo" class="form-control">
                                                        <label for="nr_alternativo" class="form-label">Nr Alternativo </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" id="email" name="email" class="form-control">
                                                        <label for="email" class="form-label">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--<input class="aluno_id" name="aluno_id" type="hidden">--}}
                                        </div>

                                    <div class="row" id="divEscolaEnredeco">
                                        <div class="col-sm-4">
                                            <label for="selectProvincia" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Provincia</label>
                                            <select title="" id="selectProvincia" class="form-control-file" data-size="8" style="width: 100%;">
                                                @foreach($provincias as $pro)
                                                    <option id="{{$pro->id}}" value="{{$pro->id}}">{{$pro->designacao}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="selectDistrito" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Distrito</label>
                                            <select name="distrito_id" title="" class="form-control-file" id="selectDistrito" data-size="8">
                                            </select>
                                            {{--<input name="distrito_id" id="distrito_id" type="hidden">--}}
                                        </div>
                                        <div class="col-sm-4 pt-3">
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
                                                    <input type="text" id="avenida_rua" name="avenida_rua" class="form-control">
                                                    <label for="avenida_rua" class="form-label">Avenida/Rua</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" id="quarteirao" name="quarteirao" class="form-control">
                                                    <label for="quarteirao" class="form-label">Quarteirao Nr</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" id="nr_casa" name="nr_casa" class="form-control">
                                                    <label for="nr_casa" class="form-label">Numero da casa</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="col-lg-12" style="border: solid #87939a 1px; border-radius: 5px">
                                    <legend class="text-left mb-0"><label style="background-color: #009688; color: white; font-size: 14px" class="btn waves-effect">Carta & Pagamento</label></legend>
                                    <hr class="mt-0">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="selectCategoria" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Categoria/Classe</label>
                                            <select name="categoria_carta_id" class="form-control-file" id="selectCategoria" data-size="8">
                                                @foreach($categorias as $cat)
                                                    <option id="{{$cat->preco}}" value="{{$cat->id}}">{{$cat->designacao}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4 pt-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="number" readonly value="0" id="valor_carta" name="valor_carta" class="form-control">
                                                    <label for="valor_carta" class="form-label">Valor da carta</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 pt-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="number" value="0.0" id="percentagem_desconto" name="percentagem_desconto" class="form-control">
                                                    <label for="percentagem_desconto" class="form-label">Desconto</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="tipo_aulas" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Tipo de aulas</label>
                                            <select title="" name="tipo_aulas" id="tipo_aulas" class="form-control-file" data-size="4" style="width: 100%;">
                                                <option value="Normal" selected>Normal</option>
                                                <option value="Intensivo">Intensivo</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 pt-3">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="number" readonly value="0" id="total_a_pagar" name="total_a_pagar" class="form-control total_a_pagar">
                                                    <label for="total_a_pagar" class="form-label">Valor a pagar</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 pt-4 float-right">
                                            <button id="btn-pagamento" type="button" class="btn btn-default waves-effect"><i class="material-icons">save</i>&nbsp;Pagamento</button>
                                            <button id="btnSave" type="submit" class="btn btn-success waves-effect float-right"><i class="material-icons">save</i>&nbsp;Registar</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </fieldset>
                        {{--</div>--}}

                        <div class="modal fade" id="modal-pagamento" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-lg">
                                    <div class="modal-header grey">
                                        <h3 class="modal-title"><i class="material-icons">attach_money</i>&nbsp;Pagamento</h3>
                                    </div>
                                    <div class="modal-body">
                                        {{--<form id="form_pagamento" action="{{url('/registarInscricao')}}" method="GET">--}}
                                        <div class="row">
                                            <div class="col-sm-7 pt-3">
                                                <fieldset class="p-l-15" style="border: solid #adadad 1px; border-radius: 5px;  height: 105px">
                                                    <legend class="btn btn-default">Tipo de pagamento</legend>
                                                    <div class="row justify-content-center pt-3">
                                                        <input name="tipo_pagamento" class="tipo_pagamento" value="numerario" type="radio" id="tipo_pagamento1" checked />
                                                        <label class="mr-3" for="tipo_pagamento1">Numerário</label>
                                                        <input name="tipo_pagamento" class="tipo_pagamento" value="deposito" type="radio" id="tipo_pagamento2" />
                                                        <label for="tipo_pagamento2">Depósito</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-5 pt-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" readonly value="0" id="total_a_pagar" name="total_a_pagar" class="form-control total_a_pagar">
                                                        <label for="total_a_pagar" class="form-label">Total a pagar</label>
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" value="0" id="valor_pagar" name="valor_pagar" class="form-control">
                                                        <label for="valor_pagar" class="form-label">Valor a pagar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row d-none" id="div_recibo">
                                            <div class="col-sm-6 pt-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" value="0" id="recibo_nr" name="recibo_nr" class="form-control">
                                                        <label for="recibo_nr" class="form-label">Número d recibo</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 pt-3">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" value="{{date('Y-m-d')}}" name="data_deposito" id="data_deposito" class="datepicker form-control data">
                                                        <label for="data_deposito" class="form-label">Data de Depósito</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer grey">
                                        <button type="button" class="btn btn-success btn-link waves-effect" data-dismiss="modal">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-Web">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-10">
                        <h4 class="modal-title" id="modalNome"></h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="min-height: 350px">
                    <div class="justify-content-center">
                        <div class="row justify-content-center">
                            <video id="video" autoplay style="width: 100%; height: 300px;" ></video>
                            <img style="position: absolute; left: 49px;" id="imgem" width="130" height="110" >
                            <canvas id="cv" style="display:none;" width="300" height="250"></canvas>
                            <button class="btn btn-circle bg-purple waves-circle waves-float waves-effect mt-3" id="btnTakePhoto"><i class="material-icons">camera</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="js-sweetalert d-none">
        <button class="btn btn-primary waves-effect" id="btnSuccess" data-type="success"></button>
    </div>
    <a id="a_streamPDF" href="{{route('streamPDF')}}" class="d-none" target="_blank" rel="next">Open PDF</a>
@endsection

@section('script')
{{--    @include('scripts.webcam')--}}
    <script>
        $(document).ready(function () {

            var video = document.getElementById('video');
            var canvas = document.getElementById('cv');
            var ctx = canvas.getContext('2d');
            var localMediaStream = null;

            $('#btn-webCam').click(function () {
                $('#modal-Web').modal({
                    show: true,
                    backdrop: "static"
                });
                navigator.getUserMedia({video: true}, function (stream) {
                    video.srcObject = stream;
                    localMediaStream = stream;
                }, function (error) {
                    console.log('error pic', error)
                });
            });

            var imagem;
            $('#btnTakePhoto').click(function () {
                if (localMediaStream) {
                    ctx.drawImage(video, 0, 0, 300, 250);
                    document.getElementById('imgem').src = canvas.toDataURL('image/png');
                    document.getElementById('fotoFinal').src = canvas.toDataURL('image/png'); //poe a foto do noivo
                    imagem = canvas.toDataURL('image/png');
                }
            });

            $('#modal-Web').on('hidden.bs.modal',function () {
                localMediaStream.getTracks()[0].stop();
            });


            $('.data').bootstrapMaterialDatePicker({
                weekStart:0, time: false
            });

            $.ajaxSetup({
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $('#li_home').removeClass('active');
            $('#li_inscicao').addClass('active');
            $('#a_inscricao').trigger('click');
            $('#a_add_inscricao').addClass('active');

            $('#selectProvincia').on('change',function () {
                $.ajax({
                    url: '/api/getDistritos',
                    type: 'POST',
                    data: {'provinciaID': $(this).val()},
                    success: function (rs) {
                        $('#selectDistrito').empty().selectpicker('refresh');
                        for (var k = 0; k < rs.dados.length; k++) {
                            $('#selectDistrito').append(
                                "<option value='" + rs.dados[k].id + "'>" + rs.dados[k].designacao + "</option>"
                            ).selectpicker('refresh');
                        }
                        $('#distrito_id').val(rs.dados[0].id);
                    },
                });
            });
            $('#selectProvincia').val($('#selectProvincia').val()).trigger('change');

            function getPreco(s) {return s[s.selectedIndex].id;}

            $('#selectCategoria').on('change',function () {
                $('#valor_carta').val(getPreco(this));
                $('.total_a_pagar').val(getPreco(this));
            });
            $('#selectCategoria').val($('#selectCategoria').val()).trigger('change');

            // function salvarPhoto(data) {
            //     imagem = document.getElementById('fotoFinal').src;
            //     $.ajax({
            //         url: "/salvarPhoto",
            //         type: 'POST',
            //         data: {'img': imagem,'inscricaoID':data},
            //         success:function () {
            //             $('#wizard_with_validation').trigger('reset');
            //             $('#a_streamPDF')[0].click();
            //         },error: function () {
            //             alert('Erro ao salvar Foto');
            //         }
            //     });
            // }

            $('#percentagem_desconto').on('input',function () { //acao de input de desconto
                valor_desconto = $(this).val();
                valor_carta = $('#valor_carta').val();
                $('.total_a_pagar').val(parseFloat(valor_carta-valor_desconto));
            });

            $('#btn-pagamento').click(function () {
                $('#modal-pagamento').modal({
                    show: true, backdrop: "static"
                });
            });

            $('.tipo_pagamento').on('change',function () {
                if($(this).val() === 'deposito'){
                    $('#div_recibo').removeClass('d-none');
                }else{
                    $('#div_recibo').addClass('d-none');
                }
            });

            $('#wizard_with_validation').submit(function (e) {
                // e.preventDefault();

                // var dados = new FormData(this);
                // dados.append("img", imagem);
                //
                // $.ajax({
                //     url: '/salvarInscricao',
                //     type: 'POST',
                //     data: dados,
                //     processData: false,
                //     contentType: false,
                //     cache: false,
                //     success: function (data) {
                //         $('#btnSuccess').trigger('click');
                //     },
                //     error: function () {
                //         alert('Erro ao salvar Inscricao');
                //     }
                // })
            });
        })
    </script>
@endsection
