@extends('layout.app')
@section('title')In @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header pt-3 pb-0">
                    <h6 class="card-title"><i class="fa fa-list-alt"></i>{{__(' Inscrições')}}</h6>
                </div>
                <div class="card-body">
                    <div class="nav nav-tabs" role="tablist">
                        <li class="mb-1" style="width: 10%">
                            <select id="selectAno" class="form-control-file" data-size="5" title="Ano">
                                @foreach($datas as $dt)
                                    <option selected value="{{date_format(date_create($dt),'Y')}}">{{date_format(date_create($dt),'Y')}}</option>
                                @endforeach
                            </select>
                        </li>
                        {{--<a id="tab-home" class="nav-item nav-link active" href="#home" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">Todas</a>--}}
                        {{--<a id="tab-other" class="nav-item nav-link" href="#profile" data-toggle="tab" role="tab" aria-controls="other" aria-selected="false">Fader</a>--}}
                    </div>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="home" aria-labelledby="tab-home">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Foto</th>
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
                                            <button class="btn btn-sm btn-primary waves-effect"><i class="fa fa-info"></i>{{__(' Mais Info')}}</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="tab-other">
                            <b>Profile Content</b>
                            <p>
                                Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                sadipscing mel.
                            </p>
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

            // $('#selectAno option:eq(3)').attr('selected','selected').selectpicker('refresh');
        });
    </script>
@endsection

