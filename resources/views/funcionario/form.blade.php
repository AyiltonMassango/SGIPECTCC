    {{--<input name="endereco_id" id="endereco_id" type="hidden">--}}
    {{csrf_field()}}
    @if(session('info'))
        <div class="alert bg-green alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{session('info')}}
        </div>
    @endif
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
                            <input type="text" name="apelido" id="apelido" class="form-control">
                            <label class="form-label" for="apelido">Apelido</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 form-group form-float">
                    <div class="form-line">
                        <input type="text" id="nome" name="nome" class="form-control">
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
                            <input type="text" id="nacionalidade" name="nacionalidade" class="form-control">
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
                            <input type="text" id="nr_carta" name="nr_carta" class="form-control">
                            <label for="nr_carta" class="form-label">Número de carta</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="nr_licenca" name="nr_licenca" class="form-control">
                            <label for="nr_licenca" class="form-label">Número de Licenca</label>
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
                <option selected value="BI">B.I</option>
                <option value="Passaporte">Passaporte</option>
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