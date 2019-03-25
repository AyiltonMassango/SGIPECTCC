<?php

namespace App\Http\Controllers;

use App\ClasseEscola;
use Illuminate\Http\Request;

class ClasseEscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categoriaCartas=CategoriaCarta::all();
        return view('CartaEscola');
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
        $this->validate($request,[
                'preco'=> 'required',
                'escolaId' => 'required',
                'categoriaCartaId' => 'required',
            ]
        );
        $classeEscola=new ClasseEscola();
        $classeEscola->escola_id=$request->input('escolaId');
        $classeEscola->cartacateg_id=$request->input('categoriaCartaId');
        $classeEscola->preco=$request->input('preco');
        $classeEscola->estado=1;
        $classeEscola->save();
        return redirect('/classeEscola')->with('info','Categoria de Carta Cadastrada associada à Escola!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClasseEscola  $classeEscola
     * @return \Illuminate\Http\Response
     */
    public function show(ClasseEscola $classeEscola)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClasseEscola  $classeEscola
     * @return \Illuminate\Http\Response
     */
    public function edit(ClasseEscola $classeEscola)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClasseEscola  $classeEscola
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClasseEscola $classeEscola)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClasseEscola  $classeEscola
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClasseEscola $classeEscola)
    {
        //
    }
}
