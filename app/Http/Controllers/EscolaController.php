<?php

namespace App\Http\Controllers;


use App\ClasseEscola;
use App\Contacto;
use App\Distrito;
use App\Escola;
use Illuminate\Http\Request;

class EscolaController extends Controller{
    public function index(){
        return value('lista de escolas');
    }

    public function create(){
        return view('escola.create');
    }

    public function store(Request $request){

        $dir = HomeController::clean(($request->nome));//pasta da escola
        $pasta = '/schools/'.$dir;

        mkdir(public_path().$pasta);
        mkdir(public_path().$pasta.'/inscricoes');

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
        echo $pasta;
    }

    public function salvarFotoCortada(){
        $data = $_POST['image'];
        $pasta = $_POST['pasta'];
        list(, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);

        $data = base64_decode($data);
        $imageName = '/logo.jpg';
        file_put_contents(public_path().$pasta.$imageName, $data);
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

    public static function getCategoriaCarta($escola_id){
        $categorias = ClasseEscola::query()
            ->join('escolas','classe_escolas.escola_id','=','escolas.id')
            ->join('categoria_cartas','classe_escolas.cartacateg_id','=','categoria_cartas.id')
            ->where('escolas.id',$escola_id)
            ->where('classe_escolas.estado','=',1)
            ->select('categoria_cartas.designacao','classe_escolas.preco','categoria_cartas.id')->get();
//        return response()->json(array('dados' => $categorias));
        return $categorias;
    }
}