<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta />
    <style>
        strong{
            font-weight: normal;
            font-size: 14px;
        }
        .linha3{ /*linha com duas colunas*/
            height: 20px;
            margin: 2px 0 0 0;
            width: 100%;
        }
        .linha3 > h6{
            width: 32.8%;
            height: 30px;
            margin: 2px;
            padding: 5px 0 0 0;
            display: inline-block;
        }
        .linha3 > h6:last-child{
            width: 33.3%;
            height: 20px;
            margin: 0;
            padding: -2px 0 0 0;
            display: inline-block;
        }
        code{
            font-size: 14px;
            margin-left: 5px;
        }

        .linha2{
            margin-top: 5px;
            height: 20px;
            width: 100%;
        }
        .linha2 > h6{
            width: 49%;
            margin: 0;
            height: 20px;
            padding: 5px 0 0 0;
            display: inline-block;
        }

        .txt-center{
            text-align: center;
        }
        .p-m{
            margin: 0;
            padding: 0;
        }

        td {
            height: 20px;
            /*border: 2px solid #89ccdf;*/
            font-size: 15px;
            font-weight: bold;
            /*border-right: none;*/
            /*border-bottom: none;*/
        }
        td > p{
            border-bottom: solid 1px #3c3f41;
            /*margin-top: 5px;*/
            padding: 2px 0 2px 2px;
            height: 20px;
            width: 101%;
            margin: 2px;
        }
        td > p:last-child{
            border-bottom: none;
            padding: 0 0 0 2px;
        }
        .no-border{
            border: none;
        }
        @page  {size: A4; margin: 15px 0 0 15px;}
    </style>
</head>
<body>
    <section >
        @include('report.frente')
        <div class="p-m">
            <h6 class="txt-center" style="height: 30px;margin: 2px"><a style="font-size: 20px">Horário:&nbsp; </a> <strong>Teoria: Código de Estrada das @for($i=0; $i<15;$i++) _ @endfor às @for($i=0; $i<15;$i++) _ @endfor Horas</strong></h6>
            <h6 class="txt-center" style="height: 30px;margin: 2px"><strong>@for($i=0; $i<31;$i++)&nbsp;@endfor Prática de Condução: das @for($i=0; $i<15;$i++) _ @endfor às @for($i=0; $i<15;$i++) _ @endfor Horas</strong></h6>
        </div>
    </section>
    <br>
    <br>
    <br>
    {{--<hr style="background-color: #262b28; margin-bottom: 3px">--}}
    <section>
        @include('report.frente')
        <br>
        <table border="2" style="width: 80%; height: 60px;border-color: black; margin: auto">
            <thead>
            <tr>
                <th class="no-border"></th>
                <th class="no-border"></th>
                <th></th>
                <th>1º Exame</th>
                <th>2º Exame</th>
                <th>3º Exame</th>
            </tr>
            </thead>
            <tbody id="tabeAllCorpo">
            <tr>
                <td>Data do</td>
                <td>
                    <p>Inicio da Instrução</p>
                    <p>Fim de Instrução</p>
                </td>
                @for($t=0; $t<4; $t++)
                    <td>
                        <p></p>
                        <p></p>
                    </td>
                @endfor
            </tr>
            <tr>
                <td>Hora dadas</td>
                <td>
                    <p class="p">Práticas</p>
                    <p class="p">Teóricas</p>
                    <p class="p">Técnicas</p>
                </td>
                @for($t=0; $t<4; $t++)
                    <td>
                        <p></p>
                        <p></p>
                        <p></p>
                    </td>
                @endfor
            </tr>
            <tr>
                <td>Data de exame</td>
                @for($t=-1; $t<4; $t++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <td>Resultado</td>
                @for($t=-1; $t<4; $t++)
                    <td></td>
                @endfor
            </tr>
            </tbody>
        </table>
    </section>
</body>
</html>
