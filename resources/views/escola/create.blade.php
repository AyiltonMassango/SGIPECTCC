@extends('layout.app')
@php
    $provincias = \App\Provincia::all();
@endphp
@section('css')
    <link href="{{asset('plugins/croppie/croppie.css')}}" rel="stylesheet"/>
@endsection
@section('title')
    {{__('Cadastrar Escola')}}
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header pt-3 pb-0">
                    <h5 class="card-title"><i class="fa fa-pencil"></i>&nbsp;Cadastrar Escola</h5>
                </div>
                <div class="body">
                    <div id="divAlert" class="alert bg-green alert-dismissible d-none" role="alert">
                        <button type="button" class="close" id="btn-close-alert"><span aria-hidden="true">×</span></button>
                        <h6 id="alert-text" class="mt-0 mb-0">Escola cadastrada com sucesso!</h6>
                    </div>

                    <form method="POST" id="form_validation" autocomplete="off">
                        <input type="hidden" id="cor_escola" name="cor_escola" value="red">
                        <input type="file" style="display: none" id="inputFoto" accept="image/jpeg/png" name="inputFoto">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4 justify-content-center">
                                <fieldset class="pl-3 pr-3 pt-0" style="border: solid #adadad 1px; border-radius: 5px">
                                    <legend>
                                        <label for="inputFoto" style="width: 100%" class="btn btn-primary waves-effect">
                                            <i class="fa fa-photo green">
                                            </i>&nbsp;Anexa Logotipo
                                        </label>
                                    </legend>
                                    <div class="row justify-content-center" style="height: 190px;">
                                        <div id="uploadCrop"></div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-sm-8">
                                <div class="row ">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="nome" id="escola" class="form-control" required>
                                                <label class="form-label" for="escola">Nome</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="alvara" name="alvara_nr" class="form-control" required>
                                                <label for="alvara" class="form-label">Alvará Nr.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="nuit" name="nuit" class="form-control" required>
                                                <label for="nuit" class="form-label">Nuit</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="slogan" id="slogan" class="form-control" required>
                                                <label for="slogan" class="form-label">Slogan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="telefone" name="nr_telefone" class="form-control" required>
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
                                    <div class="col-sm-4 mt-2">
                                        <div id="div-cor" class="red" style="border-radius: 5px">
                                            <button type="button" id="btn-cor" class="btn btn-default mb-0">choose color</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
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

                        <div class="row">
                            <div class="col-sm-4">
                                <label for="selectProvincia" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Provincia</label>
                                <select id="selectProvincia" class="form-control-file" data-size="8">
                                    @foreach($provincias as $pro)
                                        <option value="{{$pro->id}}">{{$pro->designacao}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label for="selectDistrito" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Distrito</label>
                                <select class="form-control-file" id="selectDistrito" data-size="8">
                                </select>
                                <input name="distrito_id" id="distrito_id" type="hidden">
                            </div>
                            <div class="col-sm-4">
                                <br>
                                <div class="form-group form-float m-t--10">
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
                                        <input type="text" id="avenidaRua" name="avenida_rua" class="form-control" required>
                                        <label for="avenidaRua" class="form-label">Avenida/Rua</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-6 form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="quartNr" name="quarteirao" class="form-control" required>
                                            <label for="quartNr" class="form-label">Quarteirao Nr</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="CasaNr" name="nr_casa" class="form-control" required>
                                            <label for="CasaNr" class="form-label">Casa Nr.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <button class="btn btn-default waves-effect" type="button">
                                    <i class="material-icons">clear</i>&nbsp;Limpar Campos
                                </button>
                                <button id="btnSave" type="submit" class="btn btn-success waves-effect float-right">
                                    <i class="material-icons">save</i>&nbsp;Registar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-color">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-10">
                        <h4 class="modal-title">Chosse Color</h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="justify-content-center" id="cores">
                        <ul class="demo-choose-skin">
                            <li data-theme="red" class="active">
                                <div class="red"></div>
                                <span>Red</span>
                            </li>
                            <li data-theme="pink">
                                <div class="pink"></div>
                                <span>Pink</span>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>
                            <li data-theme="deep-purple">
                                <div class="deep-purple"></div>
                                <span>Deep Purple</span>
                            </li>
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                                <span>Indigo</span>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="light-blue">
                                <div class="light-blue"></div>
                                <span>Light Blue</span>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="teal">
                                <div class="teal"></div>
                                <span>Teal</span>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="light-green">
                                <div class="light-green"></div>
                                <span>Light Green</span>
                            </li>
                            <li data-theme="lime">
                                <div class="lime"></div>
                                <span>Lime</span>
                            </li>
                            <li data-theme="yellow">
                                <div class="yellow"></div>
                                <span>Yellow</span>
                            </li>
                            <li data-theme="amber">
                                <div class="amber"></div>
                                <span>Amber</span>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="deep-orange">
                                <div class="deep-orange"></div>
                                <span>Deep Orange</span>
                            </li>
                            <li data-theme="brown">
                                <div class="brown"></div>
                                <span>Brown</span>
                            </li>
                            <li data-theme="grey">
                                <div class="grey"></div>
                                <span>Grey</span>
                            </li>
                            <li data-theme="blue-grey">
                                <div class="blue-grey"></div>
                                <span>Blue Grey</span>
                            </li>
                            <li data-theme="black">
                                <div class="black"></div>
                                <span>Black</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('plugins/croppie/croppie.js')}}"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $('#btn-cor').click(function () {
                $('#modal-color').modal({
                    show: true,
                    backdrop: "static"
                });
            });

            $('#cores .demo-choose-skin li').on('click', function () {
                var $this = $(this);
                $('.demo-choose-skin li').removeClass('active');
                $this.addClass('active');
                $('#cor_escola').val($this.data('theme'));
                $('#div-cor').removeClass();
                $('#div-cor').addClass($this.data('theme'));
                $('#modal-color').modal('toggle');
            });

            $('#li_home').removeClass('active');
            $('#li_ecola').addClass('active');
            $('#a_escola').trigger('click');
            $('#a_add_escola').addClass('active');

            function preencherDistrit(select,provinciaID) {
                $.ajax({
                    url: '/api/getDistritos',
                    type: 'POST',
                    data: {'provinciaID': provinciaID},
                    success: function (rs) {
                        $(select).empty().selectpicker('refresh');
                        for (var k = 0; k < rs.dados.length; k++) {
                            $(select).append("<option value='" + rs.dados[k].id + "'>" + rs.dados[k].designacao + "" +
                                "</option>"
                            ).selectpicker('refresh');
                        }
                        document.getElementById('distrito_id').value = rs.dados[0].id;
                    },
                    fail: function () {
                        alert('erro ao buscar distritos');
                    }
                });
            }

            $('#selectProvincia').on('change',function () {
                preencherDistrit('#selectDistrito',$(this).val());
            });

            $('#selectDistrito').on('change',function () {
                document.getElementById('distrito_id').value = $(this).val();
            });

            $('#selectProvincia').val($('#selectProvincia').val()).trigger('change');

            $('#form_validation').submit(function (e) {
                e.preventDefault();
                if(!$(this).valid()) return false; // validacao d inputs obrigatorios

                $.ajax({
                    url: '/api/salvarEscola',
                    type: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false
                }).done(function (pasta) { //retorna msg
                    $('#divAlert').removeClass('d-none');
                    savarFotoCortada(pasta);
                }).fail(function () {
                    $('#divAlert').addClass('bg-danger');
                    $('#divAlert').removeClass('d-none');
                    $('#alert-text').text('Erro ao Registar Escola');
                });
            });

            $uploadCrop = $('#uploadCrop').croppie({
                enableExif: true,
                viewport: {
                    width: 220,
                    height: 95,
                },
                boundary: {
                    width: 85,
                    height: 140
                }
            });

            $('#inputFoto').on('change', function () {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    }).then(function(){
                        console.log('Foto carregada com sucesso');
                    });

                };
                reader.readAsDataURL(this.files[0]);
            });

            function savarFotoCortada(pasta){
                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function (resp) {
                    $.ajax({
                        url: '/salvarFotoCortada',
                        type: 'POST',
                        data: {'image': resp,'pasta':pasta},
                        success: function () {
                            console.info('Foto salva');
                            $('#form_validation').trigger('reset');
                        },
                    });
                });
            }
        });
    </script>
@endsection
