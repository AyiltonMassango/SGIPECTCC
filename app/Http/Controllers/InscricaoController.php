<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\CategoriaCarta;
use App\Contacto;
use App\Distrito;
use App\Endereco;
use App\Escola;
use App\Funcionario;
use App\Inscricao;
use App\Pagamento;
use App\Provincia;
use App\TipoDocumento;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use DB;
//use Dompdf\Dompdf;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;

class InscricaoController extends Controller{

    public function index(){
        $funcionario = HomeController::getFuncionarioActivo();
        $inscricoes = Inscricao::query()->where('escola_id',$funcionario->escola_id);
        return view('inscricao.index',['inscricoes'=>$inscricoes->get(),'datas'=>$inscricoes->pluck('created_at')]);
    }

    public function create(){
        $provincias = Provincia::all();
        $funcionario = HomeController::getFuncionarioActivo();
        $categorias = EscolaController::getCategoriaCarta($funcionario->escola_id);
        return view('inscricao.create',compact('provincias','categorias'));
    }

    public function store(Request $request){

        $aluno = AlunoController::store($request);
        $escola = HomeController::getFuncionarioActivo();

        if($request->total_a_pagar == $request->valor_pagar){ //se pagar todo_valor
            $estado_payment = 1;
        }else{
            $estado_payment = 0;
        }

        if(!is_dir(public_path().'/schools')){
            mkdir(public_path().'/schools');
        }

        if(!is_dir(public_path().'/schools/' .$escola->pasta)){
            mkdir(public_path().'/schools/'. $escola->pasta);
        }

        if(!is_dir(public_path().'/schools/' .$escola->pasta.'/inscricoes/')){
            mkdir(public_path().'/schools/'. $escola->pasta.'/inscricoes/');
        }

        if(!is_dir(public_path().'/schools/'. $escola->pasta.'/inscricoes/'.date('Y'))){
            mkdir(public_path().'/schools/'. $escola->pasta.'/inscricoes/'.date('Y'));
        }

        if(!is_dir(public_path().'/schools/'. $escola->pasta.'/inscricoes/'.date('Y').'/'.HomeController::clean($aluno->nome.' '.$aluno->apelido))){
            mkdir(public_path().'/schools/'. $escola->pasta.'/inscricoes/'.date('Y').'/'.HomeController::clean($aluno->nome.' '.$aluno->apelido)); //com nomes do aluno
        }
        $pastaInscricao = '/schools/'. $escola->pasta.'/inscricoes/'.date('Y').'/'.HomeController::clean($aluno->nome.' '.$aluno->apelido); //pasta um

        $inscricao = Inscricao::query()->create([
            'nr_ficha'=> date('YmdHis'),
            'foto_aluno'=> 'foto.jpg',
            'percentagem_desconto'=>$request->percentagem_desconto,
            'total_a_pagar'=>$request->total_a_pagar,
            'tipo_aulas'=>$request->tipo_aulas,
            'categoria_carta_id'=>$request->categoria_carta_id,
            'funcionario_id'=>$escola->func_id,
            'aluno_id'=>$aluno->id,
            'escola_id'=>$escola->escola_id,
            'estado_pagamento'=>$estado_payment,
            'pasta'=>$pastaInscricao,
            'nr_carta'=>date('YmdHis'),
            'historico'=>'por vir',
            'codigo_barras'=>date('YmdHis'),
        ]);

        if($request->tipo_pagamento == 'deposito'){
            Pagamento::query()->create(['tipo_pagamento'=>$request->tipo_pagamento,
                'valor_pagar'=>$request->valor_pagar,'recibo_nr'=>$request->recibo_nr,'data_deposito'=>$request->data_deposito,
                'inscricao_id'=>$inscricao->id,'funcionario_id'=>$escola->func_id
            ]);
        }else{
            Pagamento::query()->create(['tipo_pagamento'=>$request->tipo_pagamento, 'valor_pagar'=>$request->valor_pagar,
                'inscricao_id'=>$inscricao->id,'funcionario_id'=>$escola->func_id
            ]);
        }

        $imagem = substr($request->img, strpos($request->img,",")+1);
        $decode = base64_decode($imagem);
        $fp = fopen(public_path().$pastaInscricao.'/foto.jpg','wb');
        fwrite($fp, $decode);
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

        PDF::loadView('report.report_front', compact('aluno','endereco','distrito','provincia',
                'documento','contacto','inscricao','carta_categria',
                'escola','enderecoEscola',
                'distritoEscola','provinciaEscola','contactoEscola')
        )->save(public_path().$inscricao->pasta.'/frente.pdf');

        $file = public_path().$inscricao->pasta.'/frente.pdf';
        header("Content-type: application/pdf");
        header('Content-Length'.filesize($file));
        return readfile($file);
    }

    public function streamPDF(){
        $idAluno = Aluno::query()->max('id');
        $this->export_Frente($idAluno);
    }

    public function salvarPhoto(){
        $inscricao = Inscricao::query()->find($_POST['inscricaoID']);
        $imagem = substr($_POST['img'], strpos($_POST['img'],",")+1);
        $decode = base64_decode($imagem);
        $fp = fopen(public_path().$inscricao->pasta.'/foto.jpg','wb');
        fwrite($fp, $decode);
    }

    public function show(Inscricao $inscricao){
        //
    }

    public function edit(Inscricao $inscricao){
        //
    }
    public function update(Request $request, Inscricao $inscricao){

    }

    public function destroy(Inscricao $inscricao){

    }
}
