<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Escola;
use App\FuncCategoriaEscola;
use App\Funcionario;
use App\Provincia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('funcionario.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $provincias = Provincia::all();
        $escolas = Escola::all();

        $funcionario = HomeController::getFuncionarioActivo();

        return view('funcionario.create',compact('provincias','escolas','funcionario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $endecoController = new EnderecoController();
        $endereco = $endecoController->store2($request);

        $tipoDocumentoController = new TipoDocumentoController();
        $tipoDoc = $tipoDocumentoController->store($request)->id;

        $user = User::query()->create([
            'name' => $request['nome'],
            'email' => $request['email'],
            'password' => Hash::make('111111'),
        ]);

        $funcionario = Funcionario::query()->create(['apelido'=>$request->apelido,'nome'=>$request->nome,'data_nascimento'=>$request->data_nascimento,
            'sexo'=>$request->sexo, 'estado_civil'=>$request->estado_civil, 'nacionalidade'=>$request->nacionalidade,
            'naturalidade'=>$request->naturalidade,
            'nr_carta'=>$request->nr_carta,
            'nr_licenca'=>$request->nr_licenca,
            'endereco_id'=>$endereco,
            'tipo_documento_id'=>$tipoDoc,
            'escola_id'=>$request->escola_id,
            'categoria_funcionario_id'=>$request->categoria_funcionario_id,
            'estado_funcionario'=>1,
            'user_id'=>$user->id
        ]);
        FuncCategoriaEscola::create(['escola_id'=>$request->escola_id, 'funcCateg_id'=>$request->categoria_funcionario_id, 'estado'=>1]);
        Contacto::query()->create(['nr_telefone'=>$request->nr_telefone,'nr_alternativo'=>$request->nr_alternativo,
            'funcionario_id' =>$funcionario->id
        ]);
        return redirect('/funcionario')->with('info','Funcionário cadastrado com sucesso!');
//        echo $user->email;
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        //
    }

    public function getCategoriaFuncionario(){
        $categorias = FuncCategoriaEscola::query()
            ->join('categoria_funcionarios','func_categoria_escolas.funcCateg_id','=','categoria_funcionarios.id')
            ->where('func_categoria_escolas.escola_id',$_POST['escola_id'])
            ->where('func_categoria_escolas.estado','=',1)
            ->select('categoria_funcionarios.*')->get();
        return response()->json(array('dados' => $categorias));
    }
}
