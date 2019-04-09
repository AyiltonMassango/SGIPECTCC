@extends('layout.app')
@php
    $escolas = \App\Escola::all();
    $categoriaCarta = \App\CategoriaCarta::all();
    $classeEscola = \App\ClasseEscola::all();
@endphp

@section('content')
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-2">
                <div class="card-header pt-3 pb-0">
                    <h6 class="card-title">
                        <i class="fa fa-pencil"></i>&nbsp;Definir Preços das Cartas nas Escolas
                    </h6>
                </div>
                <div class="body mb-0">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-0">
                            <form method="POST" action="{{url('/registarClasseEscola')}}" autocomplete="off">
                                {{csrf_field()}}
                                @if(session('info'))
                                    <div class="alert bg-green alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        {{session('info')}}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="selectEscola" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Escola de Condução</label>
                                        <select title="" id="escolaId" name="escolaId" class="form-control-file" data-size="5" style="width: 100%;" data-live-search="true">
                                            @foreach($escolas as $esc)
                                                <option id="{{$esc->id}}" value="{{$esc->id}}">{{$esc->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="selectCategoria" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Escola de Condução</label>
                                        <select title="" id="categoriaCartaId" name="categoriaCartaId" class="form-control-file" data-size="5" style="width: 100%;" data-live-search="true">
                                            @foreach($categoriaCarta as $catCarta)
                                                <option id="{{$catCarta->id}}" value="{{$catCarta->id}}">{{$catCarta->designacao}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12 form-group">
                                        <div class="form-line form-float">
                                            <label for="preco" class="form-label">Preço</label>
                                            <input type="text" name="preco" id="preco" class="form-control" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <button type="submit" class="btn btn-success waves-effect w-100">
                                            <i class="material-icons">save</i>
                                            <span>Cadastrar</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header pt-3 pb-0">
                    <h6 class="card-title">
                        <i class="fa fa-list"></i>&nbsp;Listas de Categorias de Por Escola</h6>
                </div>
                <div class="card-body mb-0">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Escola de Condução</th>
                            <th>Categoria de Carta</th>
                            <th>Preço</th>
                            <th>Estado</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classeEscola as $cE)
                            <tr>
                                @foreach($escolas as $escola)
                                    @if($cE->escola_id==$escola->id)
                                        <td scope="row">{{$escola->nome}}</td>
                                    @foreach($categoriaCarta as $cartaCateg)
                                        @if($cE->cartacateg_id==$cartaCateg->id)
                                                <td>{{$cartaCateg->designacao}}</td>
                                                <td>{{$cE->preco}}</td>
                                                @if($cE->estado==1)
                                                    <td>Activo(a)</td>
                                                  @else
                                                    <td>Inactivo(a)</td>
                                                @endif
                                        @endif
                                    @endforeach
                                    @endif
                                @endforeach
                                <td>
                                    <button href="{{url('')}}" class="btn btn-primary ver"> Ver |</button>
                                    <button href="{{url('') }}" class="label label-danger"> Editar </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop