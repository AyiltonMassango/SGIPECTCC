<?php

namespace App\Http\Controllers;

use App\CategoriaFuncionario;
use App\ClasseEscola;
use App\Contacto;
use App\Distrito;
use App\Endereco;
use App\Escola;
use App\Funcionario;
use App\User;
use Illuminate\Http\Request;

class EscolaController extends Controller{
    public function index(){
        return value('lista de escolas');
    }

    public function create(){
        return view('escola.create');
    }

    private function clean($string){//remocao de character iniciais
        $string = str_replace(' ','',$string);
        return strtolower(preg_replace('/[^A-Za-z0-9-]/','',$string));
    }

    public function store(Request $request){

        $dir = $this->clean($request->nome);//pasta da escola
        $pasta = '/schools/'.$dir;

        if(is_dir(public_path().$pasta)){
            echo 'error';
        }else {
            mkdir(public_path() . $pasta);

            $enderecoController = new EnderecoController();
            $enderecoID = $enderecoController->store2($request); //salva enderecoo e retorna seu id;

            $escola = Escola::query()->create(['nome' => $request->nome, 'alvara_nr' => $request->alvara_nr,
                'nuit' => $request->nuit, 'slogan' => $request->slogan,'pasta'=>$dir,'cor_escola'=>$request->cor_escola,
                'estado' => 1, 'endereco_id' => $enderecoID, 'logo' => 'logo.jpg'
            ]);

            Contacto::query()->create(['nr_telefone'=>$request->nr_telefone,'nr_alternativo'=>$request->nr_alternativo,
                'email'=>$request->email,
                'escola_id' =>$escola->id
            ]);

            if (isset($_FILES['inputFoto'])) {
                $tmp = $_FILES['inputFoto']['tmp_name'];
                move_uploaded_file($tmp, public_path() . $pasta . '/logo.jpg');
            }
            echo 'done';
        }
    }

    public function show(Escola $escola){

    }

    public function edit(Escola $escola){
        //
    }

    public function update(Request $request, Escola $escola){
        //
    }
    public function destroy(Escola $escola){

    }

    public function getDistritos(){
        $distritos = Distrito::query()->where('provincia_id', $_POST['provinciaID'])->get();
        return response()->json(array('dados' => $distritos));
    }

    public function getCategoriaCarta(){
        $categorias = ClasseEscola::query()
            ->join('escolas','classe_escolas.escola_id','=','escolas.id')
            ->join('categoria_cartas','classe_escolas.cartacateg_id','=','categoria_cartas.id')
            ->where('escolas.id',$_POST['escola_id'])
            ->where('classe_escolas.estado','=',1)
            ->select('categoria_cartas.designacao as cat','classe_escolas.preco as price','categoria_cartas.id as idd')->get();
        return response()->json(array('dados' => $categorias));
    }
}