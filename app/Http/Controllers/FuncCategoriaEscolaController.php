<?php

namespace App\Http\Controllers;

use App\FuncCategoriaEscola;
use App\Funcionario;
use Illuminate\Http\Request;

class FuncCategoriaEscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $funcionarios = Funcionario::query()
//        ->join('funcionarios', 'func_categoria_escolas.escola_id','=','funcionarios.escola_id')
//        ->where('func_categoria_escolas.escola_id','=',1)
//        ->where('func_categoria_escolas.estado','=',1)
//        ->select('funcionarios.*')->get();


//        $categoria = FuncCategoriaEscola::query()
//            ->join('categoria_funcionarios','func_categoria_escolas.funcCateg_id','=','categoria_funcionarios.id')
////            ->join('funcionarios', 'func_categoria_escolas.escola_id','=','funcionarios.escola_id')
//            ->where('func_categoria_escolas.escola_id','=',1)
//            ->where('func_categoria_escolas.estado','=',1)
//            ->select('categoria_funcionarios.*')->get();

        $funcionario = HomeController::getFuncionarioActivo();
        return view('escola.funcionarios.lista',compact('funcionario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FuncCategoriaEscola  $funcCategoriaEscola
     * @return \Illuminate\Http\Response
     */
    public function show(FuncCategoriaEscola $funcCategoriaEscola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FuncCategoriaEscola  $funcCategoriaEscola
     * @return \Illuminate\Http\Response
     */
    public function edit(FuncCategoriaEscola $funcCategoriaEscola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FuncCategoriaEscola  $funcCategoriaEscola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FuncCategoriaEscola $funcCategoriaEscola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FuncCategoriaEscola  $funcCategoriaEscola
     * @return \Illuminate\Http\Response
     */
    public function destroy(FuncCategoriaEscola $funcCategoriaEscola)
    {
        //
    }
}
