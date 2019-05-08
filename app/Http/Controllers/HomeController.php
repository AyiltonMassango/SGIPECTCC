<?php

namespace App\Http\Controllers;

use App\CategoriaFuncionario;
use App\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('home',['funcionario'=>self::getFuncionarioActivo()]);
    }

    public static function getFuncionarioActivo(){
        return Funcionario::query()->join('escolas','escolas.id','=','funcionarios.escola_id')
            ->join('categoria_funcionarios','categoria_funcionarios.id','=','funcionarios.categoria_funcionario_id')
            ->select('escolas.nome as escola','escolas.pasta','escolas.id as escola_id','categoria_funcionarios.*','funcionarios.id as func_id')
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

    public static function clean($string){//remocao de character iniciais
        $string = str_replace(' ','',$string);
        return strtolower(preg_replace('/[^A-Za-z0-9-]/','',$string));
    }
}
