@extends('layout.app')
@section('title')In @endsection
@php
    $categoriaCarta = \App\CategoriaCarta::all();
    $escolaClasse = \App\FuncCategoriaEscola::all();
    $funcionarios = \App\Funcionario::all();
@endphp
@section('content')

    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Lista de Funcionários
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Nome Funcionário</th>
                                <th>Categoria do Funcionário</th>
                                <th>Estado</th>
                                <th>Acções</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome Funcionário</th>
                                <th>Categoria do Funcionário</th>
                                <th>Estado</th>
                                <th>Acções</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($escolaClasse as $eC)
                            <tr>
                                @foreach($funcionario as $func)
                                    @foreach($funcionarios as $funcEscola)
                                    @if($eC->escola_id==$func->escola_id and $func->escola_id==$funcEscola->escola_id)
                                         <td>{{$funcEscola->nome}} {{$funcEscola->apelido}}</td>
                                        @else
                                        <td> Sem funcionário alocado</td>
                                    @endif
                                    @foreach($categoriaCarta as $categ)
                                        @if($eC->funcCateg_id==$categ->id and $eC->escola_id==$func->escola_id)
                                             <td>{{$categ->designacao}}</td>
                                            @else
                                            <td> Sem categoria associada</td>
                                         @endif
                                    @if($categ->estado==1)
                                        <td>Activo(a)</td>
                                    @else
                                        <td>Inactivo(a)</td>
                                    @endif
                                <td>
                                    <button href="{{url('')}}" class="btn btn-primary ver"> Ver |</button>
                                    <button href="{{url('') }}" class="label label-danger"> Editar </button></td>
                            </tr>
                                @endforeach
                                @endforeach
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->

@stop
