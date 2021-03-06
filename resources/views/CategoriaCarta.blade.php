@extends('layout.app')
@section('content')
    <!-- Vertical Layout -->
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card mb-2">
                <div class="card-header pt-3 pb-0">
                    <h6 class="card-title">
                        <i class="fa fa-pencil"></i>&nbsp;Resgistar Categorias das Cartas
                    </h6>
                </div>
                <div class="body mb-0">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-0">
                            <form method="POST" action="{{url('/registarcategcartas')}}" autocomplete="off">
                                {{csrf_field()}}
                                @if(session('info'))
                                    <div class="alert bg-green alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        {{session('info')}}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-8 form-group">
                                        <div class="form-line form-float">
                                            <input type="text" name="designacao" id="designacao" class="form-control" required>
                                            <label for="designacao" class="form-label">Designação</label>
                                        </div>
                                    </div>
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
                        <i class="fa fa-list"></i>&nbsp;Categorias Registadas
                    </h6>
                </div>
                <div class="card-body mb-0">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Designação</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categoriaCartas as $cartaCateg)
                            <tr>
                                <th scope="row">{{$cartaCateg->id}}</th>
                                <td>{{$cartaCateg->designacao}}</td>
                                <td>
                                    <button data-title="{{$cartaCateg->designacao}}" class="btn btn-primary btn-sm mt-0 mb-0
                                     waves-effect waves-circle waves-float" title="Info" type="button">
                                        <i class="material-icons">info</i>
                                    </button>
                                    <button class="btn btn-sm btn-warning mt-0 mb-0 waves-effect waves-circle waves-float"
                                            title="Editar" type="button"><i class="material-icons">mode_edit</i>
                                    </button>
                                    <button class="btn btn-sm btn-danger mt-0 mb-0  waves-effect waves-circle waves-float"
                                            title="Remover" type="button"><i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

            <div class="card">
                <div class="header pt-3 pb-0">
                    <h6 class="card-title">
                        <i class="fa fa-info-circle"></i>&nbsp;Escolas que Leccionam&nbsp;<strong id="h6School" style=color:#82b6ff>Ligeiros</strong>
                    </h6>
                </div>
                <div class="body">
                    <div class="list-group">
                        <a class="list-group-item">Jessica</a>
                        <a class="list-group-item">Emilio</a>
                        <a class="list-group-item">RosFil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function () {
            $('#li_home').removeClass('active');
            $('#li_categoria').addClass('active');

            $('.btn-primary').click(function () {
                $('#h6School').html($(this).attr('data-title'));
            })
        })
    </script>
@endsection