<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Escola;
use Illuminate\Http\Request;

class EnderecoController extends Controller
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
        echo $this->salvar($request)->id;
    }

    public function storeAndReturnId(Request $request){
        return $this->salvar($request)->id;
    }

    public static function salvar(Request $request){
        $endereco = Endereco::query()->create(['bairro' => $request->bairro,
            'quarteirao' => $request->quarteirao, 'avenida_rua' => $request->avenida_rua,
            'nr_casa' => $request->nr_casa, 'distrito_id' => $request->distrito_id
        ]);
        return $endereco;
    }

//    public function salvarEndereco(Request $request){
//        return new Endereco([
//            'bairro' => $request->bairro,
//            'quarteirao' => $request->quarteirao,
//            'avenida_rua' => $request->avenida_rua,
//            'nr_casa' => $request->nr_casa,
//            'distrito_id' => $request->distrito_id
//        ]);
//    }

    public function show(Endereco $endereco){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit(Endereco $endereco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Endereco $endereco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Endereco $endereco)
    {
        //
    }
}
