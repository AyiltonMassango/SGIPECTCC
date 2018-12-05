<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\CategoriaCarta;
use App\Contacto;
use App\Distrito;
use App\Endereco;
use App\Escola;
use App\Inscricao;
use App\Pagamento;
use App\Provincia;
use App\TipoDocumento;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use PDF;
use DB;
//use Dompdf\Dompdf;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;

class InscricaoController extends Controller{

    public function index(){
        //
    }

    public function create(){

        $provincias = Provincia::all();
        $funcionario = HomeController::getFuncionario();
        return view('inscricao.create',compact('provincias','funcionario'));
    }

    public function store(Request $request){
        $inscricao = Inscricao::query()->create([
            'nr_ficha'=>$request->nr_ficha,
            'foto_aluno'=>$request->foto_aluno,
            'percentagem_desconto'=>$request->percentagem_desconto,
            'total_a_pagar'=>$request->total_a_pagar,
            'tipo_aulas'=>$request->tipo_aulas,
            'categoria_carta_id'=>$request->categoria_carta_id,
            'aluno_id'=>$request->aluno_id,
            'escola_id'=>$request->escola_id,
            'estado_pagamento'=>1,
        ]);
        echo $inscricao->id; //retorna o id da inscricao
    }

    public function storePayment(Request $request){ //salva o pagamento


        $funcionario_id = HomeController::getFuncionario()->func_id;
        if($request->tipo_pagamento == 'deposito'){
            $pagamento = Pagamento::query()->create(['tipo_pagamento'=>$request->tipo_pagamento,
                'valor_pagar'=>$request->valor_pagar,'recibo_nr'=>$request->recibo_nr,'data_deposito'=>$request->data_deposito,
                'inscricao_id'=>$request->inscricao_id,'funcionario_id'=>$funcionario_id
            ]);
        }else{
            $pagamento = Pagamento::query()->create(['tipo_pagamento'=>$request->tipo_pagamento, 'valor_pagar'=>$request->valor_pagar,
                'inscricao_id'=>$request->inscricao_id,'funcionario_id'=>$funcionario_id
            ]);
        }
        $inscricao = Inscricao::query()->find($request->inscricao_id);
        if($inscricao->total_a_pagar == $pagamento->valor_pagar){ //se pagar todo_valor
            $inscricao->estado_pagamento = 1;
        }else{                                                  //se nao pagar
            $inscricao->estado_pagamento = 0;
        }
        $inscricao->update();
        $this->export_Frente($request->aluno_id);
    }

    public function export_Frente($idAluno){

        $aluno = Aluno::query()->find($idAluno);
        $endereco = Endereco::query()->find($aluno->endereco_id);
        $distrito = Distrito::query()->find($endereco->distrito_id);
        $provincia = Provincia::query()->find($distrito->provincia_id)->designacao;
        $documento = TipoDocumento::query()->find($aluno->tipo_documento_id);
        $contacto = Contacto::query()->where('aluno_id',$aluno->id)->first();
        $inscricao = Inscricao::query()->where('aluno_id',$aluno->id)->first();
        $carta_categria = CategoriaCarta::query()->find($inscricao->categoria_carta_id)->designacao;
        $escola = Escola::query()->find($inscricao->escola_id);
        $enderecoEscola = Endereco::query()->find($escola->endereco_id);
        $distritoEscola = Distrito::query()->find($enderecoEscola->distrito_id);
        $provinciaEscola = Provincia::query()->find($distritoEscola->provincia_id)->designacao;
        $contactoEscola = Contacto::query()->where('escola_id',$escola->id)->first();

        $pasta = '/schools/'.$escola->pasta;
        $nomeFile = '/aluno_'.$aluno->id.'.pdf';
        if(!(is_dir(public_path().$pasta))){ //verifica se ja existe uma pasta
            mkdir(public_path() . $pasta); //se nao...cria uma
        }

        PDF::loadView('report.report_front', compact('aluno','endereco','distrito','provincia',
                'documento','contacto','inscricao','carta_categria',
                'escola','enderecoEscola',
                'distritoEscola','provinciaEscola','contactoEscola')
        )->save(public_path().$pasta.$nomeFile);

        $file = public_path().$pasta.$nomeFile;
        header("Content-type: application/pdf");
        header('Content-Length'.filesize($file));
        return readfile($file);
    }

    public function salvarPhoto(){
        $escola = Escola::query()->find($_POST['escola_id']);
        $nameFoto = '/'.date('Ymdhis').'.jpg';

        $imagem = substr($_POST['img'], strpos($_POST['img'],",")+1);
        $decode = base64_decode($imagem);
        $fp = fopen(public_path().'/schools/'.$escola->pasta.$nameFoto,'wb');
        fwrite($fp, $decode);
        echo $nameFoto;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inscricao  $inscricao
     * @return \Illuminate\Http\Response
     */
    public function show(Inscricao $inscricao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inscricao  $inscricao
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscricao $inscricao){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscricao  $inscricao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscricao $inscricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inscricao  $inscricao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscricao $inscricao)
    {
        //
    }
}
