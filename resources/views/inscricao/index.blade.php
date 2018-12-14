@extends('layout.app')
@section('title')In @endsection
@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Inscrições</h2>
                </div>
                <div class="body">
                    <!-- Nav tabs -->
                    <div class="nav nav-tabs" role="tablist">
                        <li class="" style="width: 8%">
                            <select class="form-control-file" title="Ano" data-size="5">
                                <option selected value="2000">2000</option>
                                <option value="2001">2001</option>
                            </select>
                        </li>
                        <a id="tab-home" class="nav-item nav-link active" href="#home" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">Todas</a>
                        <a id="tab-other" class="nav-item nav-link" href="#profile" data-toggle="tab" role="tab" aria-controls="other" aria-selected="false">SETTINGS</a>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="home" aria-labelledby="tab-home">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nome Completo</th>
                                    <th>Categoria de Carta</th>
                                    <th>Estado de Pagamento</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
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
        });
    </script>
@endsection

