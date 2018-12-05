<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Provincia;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $tipoDocumetoId = TipoDocumentoController::store($request)->id;

        $aluno =Aluno::query()->create([
            'apelido'=>$request->apelido,
            'nome'=>$request->nome,
            'data_nascimento'=>$request->data_nascimento,
            'sexo'=>$request->sexo,
            'estado_civil'=>$request->estado_civil,
            'nacionalidade'=>$request->nacionalidade,
            'naturalidade'=>$request->naturalidade,
            'profissao'=>$request->profissao,
            'local_trabalho'=>$request->local_trabalho,
            'nivel_academico'=>$request->nivel_academico,
            'nome_pai'=>$request->nome_pai,
            'nome_mae'=>$request->nome_mae,
            'endereco_id'=>$request->endereco_id,
            'tipo_documento_id'=>$tipoDocumetoId,
        ]);
        echo $aluno->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        //
    }
}
