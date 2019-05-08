@extends('layout.app')
@section('title'){{__('Lista de Inscricoes')}} @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header pt-3 pb-0">
                    <h6 class="card-title"><i class="fa fa-list-alt"></i>{{__(' Inscrições')}}</h6>
                </div>
                <div class="card-body">
                    {{--<div class="nav nav-tabs" role="tablist">--}}
                        {{--<li class="mb-1" style="width: 10%">--}}
                            {{--<select id="selectAno" class="form-control-file" data-size="5" title="Ano">--}}
                                {{--@foreach($datas as $dt)--}}
                                    {{--<option selected value="{{date_format(date_create($dt),'Y')}}">{{date_format(date_create($dt),'Y')}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</li>--}}

                    {{--</div>--}}

                    <div class="tab-content">
                        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                <div id="tabela" class="carousel-item active">
                                    <div class="row justify-content-end">
                                        {{--<select id="selectAno" class="form-control-file col-sm-6" data-size="5" title="Ano">--}}
                                            {{--@foreach($datas as $dt)--}}
                                                {{--<option selected value="{{date_format(date_create($dt),'Y')}}">{{date_format(date_create($dt),'Y')}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                        <div class="col-lg-4 mb-2">
                                            <input type="text" class="form-control" placeholder="Pesquisar">
                                        </div>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><i class="fa fa-photo"></i>{{__(' Foto')}}</th>
                                            <th>Número de Ficha</th>
                                            <th>Apelido</th>
                                            <th>Nome</th>
                                            <th>Categoria de Carta</th>
                                            <th>Estado de Pagamento</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($inscricoes as $in)
                                            <tr>
                                                <td><img class="img-thumbnail" src="{{asset($in->pasta.'/'.$in->foto_aluno)}}" width="48" height="40"></td>
                                                <td>{{$in->nr_ficha}}</td>
                                                <td>{{$in->getAluno->apelido}}</td>
                                                <td>{{$in->getAluno->nome}}</td>
                                                <td>{{$in->getCarta->designacao}}</td>
                                                @if($in->estado_pagamento == 0)
                                                    <td><label  class="btn btn-warning">Não Concluido</label></td>
                                                @else
                                                    <td><label  class="btn btn-success">Concluido</label></td>
                                                @endif
                                                <td>
                                                    <button class="btn btn-sm btn-default waves-effect"><i class="fa fa-pencil"></i>{{__(' Editar')}}</button>
                                                    <button class="btn btn-sm btn-danger waves-effect"><i class="fa fa-recycle"></i>{{__(' Remover')}}</button>
                                                    <button data-inscricao="{{$in}}" data-carta="{{$in->getCarta->designacao}}" data-aluno="{{$in->getAluno}}" data-foto="{{$in->pasta.'/'.$in->foto_aluno}}" class="btn btn-sm btn-primary waves-effect btn-mais-info"><i class="fa fa-info"></i>{{__(' Mais Info')}}</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div id="" class="carousel-item">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="row justify-content-start" style="height: 200px;">
                                                    <img id="foto" class="image img-thumbnail" src="{{asset('images/backend/person.png')}}" width="270" style="height: 100%; border-radius: 5px">
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="list-group" id="list-tab" role="tablist">
                                                            <a class="list-group-item list-group-item-action active" id="list-dados-list" data-toggle="list" href="#list-dados" role="tab" aria-controls="dados">
                                                                <i class="fa fa-info-circle"></i>{{__(' Dados Pessoais')}}</a>
                                                            <a class="list-group-item list-group-item-action" id="list-inscricao-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                                                                <i class="fa fa-bookmark"></i>{{__(' Dados de Inscrição')}}</a>
                                                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                                                                <i class="fa fa-history"></i>{{__(' Histórico')}}</a>
                                                            <a class="list-group-item list-group-item-action" id="btn-back">
                                                                <i class="fa fa-arrow-circle-left"></i>{{__(' Voltar')}}</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="list-dados" role="tabpanel" aria-labelledby="list-dados-list">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>Nome:</strong>
                                                                        <label id="lb-nome" class="m-0">Fader Azevedo Macuvele</label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>Sexo:</strong>
                                                                        <label id="lb-sexo" class="m-0"></label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>Data de Nascimento:</strong>
                                                                        <label id="lb-data" class="m-0"></label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>Estado Cívil:</strong>
                                                                        <label id="lb-estado-civil" class="m-0"></label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>Nacionalidade:</strong>
                                                                        <label id="lb-nacionalidade" class="m-0"></label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>Naturalidade:</strong>
                                                                        <label id="lb-naturalidade" class="m-0"></label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>Nível Académico:</strong>
                                                                        <label id="lb-nivel-academico" class="m-0"></label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>Profissão:</strong>
                                                                        <label id="lb-profissao" class="m-0"></label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>Local de Trabalho:</strong>
                                                                        <label id="lb-local-trabalho" class="m-0"></label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-inscricao-list">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>{{__('Numero de Ficha:')}}</strong>
                                                                        <label id="lb-numero-ficha" class="m-0"></label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>{{__('Categoria de Carta:')}}</strong>
                                                                        <label id="lb-carta-categoria" class="m-0"></label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>{{__('Codigo de Barras:')}}</strong>
                                                                        <label id="lb-codigo-barras" class="m-0"></label>
                                                                    </li>
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <strong>Tipo de Aulas:</strong>
                                                                        <label id="lb-tipo-aulas" class="m-0"></label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                                                            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#li_home').removeClass('active');
            $('#li_inscicao').addClass('active');
            $('#a_inscricao').trigger('click');
            $('#a_list_inscricao').addClass('active');

            $('#btn-back').click(function () {
                $('#carousel').carousel('prev');
            });

            $('.btn-mais-info').click(function () {
                document.getElementById('foto').src = $(this).attr('data-foto');
                $('#carousel').carousel('next');
                var aluno = $.parseJSON($(this).attr('data-aluno'));
                //dados pessoais
                $('#lb-nome').text(aluno['nome']+' '+aluno['apelido']);
                $('#lb-sexo').text(aluno['sexo']);
                $('#lb-data').text(formatarData(new Date(aluno['data_nascimento'])) + ' ('+ parseInt(new Date().getFullYear() - new Date(aluno['data_nascimento']).getFullYear())+' Anos de Idade)');
                $('#lb-estado-civil').text(aluno['estado_civil']);
                $('#lb-nacionalidade').text(aluno['nacionalidade']);
                $('#lb-naturalidade').text(aluno['naturalidade']);
                $('#lb-nivel-academico').text(aluno['nivel_academico']);
                $('#lb-profissao').text(aluno['profissao']);
                $('#lb-local-trabalho').text(aluno['local_trabalho']);

                var inscricao = $.parseJSON($(this).attr('data-inscricao'));
                $('#lb-carta-categoria').text($(this).attr('data-carta'));
                $('#lb-numero-ficha').text(inscricao['nr_ficha']);
                $('#lb-codigo-barras').text(inscricao['codigo_barras']);
                $('#lb-tipo-aulas').text(inscricao['tipo_aulas']);
            });
            // $('#selectAno option:eq(3)').attr('selected','selected').selectpicker('refresh');
            function formatarData(data) {
                var meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril','Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
                var dia = data.getDay();
                var mesIndx = data.getMonth();
                var ano = data.getFullYear();
                return dia+'/'+meses[mesIndx]+'/'+ano;
            }
        });
    </script>
@endsection

