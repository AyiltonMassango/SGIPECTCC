@extends('layout.app')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                {{--<div class="row clearfix">--}}
                <form id="formFuncionacrio" autocomplete="off" action="{{url('funcionario/store')}}">
                    <div id="wizard_horizontal">
                        <h2>Dados Pessoais</h2>
                        <section>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @include('funcionario.form')
                            </div>
                        </section>

                        <h2>Outros Dados</h2>
                        <section>
                            <fieldset class="col-lg-12" style="border: solid #adadad 1px; border-radius: 5px">
                                <legend class="text-left mb-0"><label style="background-color: #009688; color: white; font-size: 14px" class="btn btn-dark waves-effect">Contacto e Endereço</label></legend>
                                <hr class="mt-0">
                                <div class="row pb-0">
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" id="nr_telefone" name="nr_telefone" class="form-control" required>
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
                                    <input class="aluno_id" name="aluno_id" type="hidden">
                                </div>

                                <div class="row" id="divEscolaEnredeco">
                                    <div class="col-sm-4">
                                        <label for="selectProvincia" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Provincia</label>
                                        <select title="" id="selectProvincia" class="form-control-file" data-size="5" style="width: 100%;">
                                            @foreach($provincias as $pro)
                                                <option id="{{$pro->id}}" value="{{$pro->id}}">{{$pro->designacao}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="selectDistrito" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Distrito</label>
                                        <select title="" name="distrito_id" class="form-control-file" id="selectDistrito" data-size="5">
                                        </select>
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

                            <fieldset class="col-lg-12 mt-2" style="border: solid #87939a 1px; border-radius: 5px">
                                <legend class="text-left mb-0"><label style="background-color: #009688; color: white; font-size: 14px" class="btn waves-effect">Dados bla bla bla</label></legend>
                                <hr class="mt-0">
                                <div class="row">
                                    @if($funcionario == null)
                                        <div class="col-sm-4">
                                            <label for="selectEscola" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Escola</label>
                                            <select title="" name="escola_id" id="selectEscola" class="form-control-file" data-size="8" style="width: 100%;">
                                                @foreach($escolas as $scl)
                                                    <option value="{{$scl->id}}">{{$scl->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="selectCategoria" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Categoria do Funcionário</label>
                                            <select title="" name="categoria_funcionario_id" class="form-control-file" id="selectCategoria" data-size="8">
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-sm-4 d-none">
                                            <label for="selectEscola" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Escola</label>
                                            <select title="" name="escola_id" id="selectEscola" class="form-control-file" data-size="8" style="width: 100%;">
                                                <option value="{{$funcionario->escola_id}}">{{$funcionario->escola}}</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="selectCategoria" class="mb-0 mt-0" style="font-size: 12px; color: #87939a">Categoria do Funcionário</label>
                                            <select title="" name="categoria_funcionario_id" class="form-control-file" id="selectCategoria" data-size="8">
                                            </select>
                                        </div>
                                    @endif

                                    <div class="col-sm-4 pt-3 mb-4">
                                        <button type="button" class="btn btn-default waves-effect p-1"><i class="material-icons">save</i>Limpar Campos</button>
                                        <button type="submit" class="btn btn-success waves-effect float-right p-1"><i class="material-icons">save</i>&nbsp;Registar</button>
                                    </div>
                                </div>
                            </fieldset>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.data').bootstrapMaterialDatePicker({
                weekStart:0, time: false
            });
            $('#li_home').removeClass('active');
            $('#li_funcionario').addClass('active');
            $('#a_funcionario').trigger('click');
            $('#a_add_funcionario').addClass('active');

            $('#selectProvincia').on('change',function () {
                $.ajax({
                    url: '/api/getDistritos',
                    type: 'POST',
                    data: {'provinciaID': $(this).val()},
                    success: function (rs) {
                        $('.xx').remove();
                        for (var k = 0; k < rs.dados.length; k++) {
                            $('#selectDistrito').append(
                                "<option class='xx' value='" + rs.dados[k].id + "'>" + rs.dados[k].designacao + "</option>"
                            ).selectpicker('refresh');
                        }
                    },
                    fail: function () {
                        alert('erro ao buscar distritos');
                    }
                });
            });
            $('#selectProvincia').val(1).trigger('change');


            $('#selectEscola').on('change',function () {
                $.ajax({
                    url: '/api/getCategoriaFuncionario',
                    type: 'POST',
                    data: {'escola_id': $(this).val()},
                    success: function (rs) {
                        if(rs.dados.length > 0) {
                            $('#selectCategoria').empty().selectpicker('refresh');
                            for (var k = 0; k < rs.dados.length; k++) {
                                $('#selectCategoria').append(
                                    "<option id='"+rs.dados[k].id+"' value='" + rs.dados[k].id + "'>" + rs.dados[k].designacao + "</option>"
                                ).selectpicker('refresh');
                            }
                        }else {
                            $('#selectCategoria').empty().selectpicker('refresh');
                        }
                    }
                });
            });
            $('#selectEscola').val($('#selectEscola').val()).trigger('change');
        })
    </script>
@endsection