<?php

namespace App\Http\Controllers;

use App\CategoriaCarta;
use Illuminate\Http\Request;

class CategoriaCartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categoriaCartas=CategoriaCarta::all();
        return view('CategoriaCarta',  compact('categoriaCartas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
                'designacao'=>'required'
            ]
        );
        $categoriaCartas=new CategoriaCarta;
        $categoriaCartas->designacao=$request->input('designacao');
//        $categoriaCartas->preco=$request->input('preco');
//        $categoriaCartas->estado=1;
        $categoriaCartas->save();
        return redirect('/categoriacarta')->with('info','Categoria de Carta Cadastrada com sucesso!');
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
     * @param  \App\CategoriaCarta  $categoriaCarta
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaCarta $categoriaCarta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriaCarta  $categoriaCarta
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaCarta $categoriaCarta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriaCarta  $categoriaCarta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaCarta $categoriaCarta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriaCarta  $categoriaCarta
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaCarta $categoriaCarta)
    {
        //
    }
}
