<?php

namespace App\Http\Controllers;

use App\CategoriaFuncionario;
use App\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('home',['funcionario'=>self::getFuncionario()]);
    }

    public static function getFuncionario(){
        return Funcionario::query()->join('escolas','escolas.id','=','funcionarios.escola_id')
            ->join('categoria_funcionarios','categoria_funcionarios.id','=','funcionarios.categoria_funcionario_id')
            ->select('escolas.nome as escola','escolas.id as escola_id','categoria_funcionarios.*','funcionarios.id as func_id')
            ->where('user_id',Auth::user()->id)->first();
    }


    public function read_theme(){
        $file = fopen(public_path().'/theme.txt','r+');
        echo fgets($file);
        fclose($file);
    }

    public function write_theme(){

        $file = fopen(public_path().'/theme.txt','w+');
        fwrite($file,$_POST['theme']);
        fclose($file);
    }
}
