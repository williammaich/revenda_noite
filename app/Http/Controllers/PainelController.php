<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Marca;
use App\Carro;
use App\Painel;

class PainelController extends Controller
{
    public function titulo(){

        $paineis = Marca::orderBy('nome')->get();

        return view('titulo',compact('paineis'));
    }

public function destaque(){

    //$paineis = Marca::orderBy('destaque')->get();

    $paineis = Carro::paginate(5);
    return view('usuario.destaque', compact('paineis'));
}


public function catalogo(){

    $paineis = Marca::orderBy('nome')->get();
    return view('usuario.catalogo',compact('paineis'));
}

public function mostrar(){

    $paineis = Carro::paginate(5);

    return view('usuario.catalogo', compact('paineis'));
}

    public function foto($id)
    {
        $reg = Carro:: find($id);
        $paineis = Marca::orderBy('nome')->get();

        return view('usuario.catalogo,usuario.destaque', compact('reg', 'acao', 'paineis'));
    }


public function catalogo_marcas(){

    $paineis = Marca::orderBy('nome')->get();


    return view('usuario.catalogo_marcas', compact('paineis'));
}

    public function pesq()
    {

        $paineis = Carro::paginate(3);

        return view('usuario.pesq', compact('paineis'));
    }


    public function filtros(Request $request)
    {
        $modelo = $request->modelo;
        $precomax = $request->precomax;


        $filtro = array();

        if (!empty($modelo)) {
            array_push($filtro, array('modelo', 'like', '%' . $modelo . '%'));
        }

        if (!empty($precomax)) {
            array_push($filtro, array('preco', '<=', $precomax));
        }


        $paineis = Carro::where($filtro)
            ->orderBy('modelo')
            ->paginate(3);

        return view('usuario.pesq', compact('paineis'));
    }

    public function veimarcas()
    {//show
        $paineis = Carro::paginate(5);



        return view('usuario.veimarcas', compact('paineis'));
    }

    public function edit($id){
        $reg = Carro:: find($id);

        $marcas = Marca::orderBy('nome')->get();

        return view('usuario.veimarcas', compact('reg', 'marcas'));
    }



    public function show($id)
    {
        $reg = Carro::find($id);



        return view('usuario.veimarcas', compact('reg'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'nome' => 'required',
            'telefone' => 'required|numeric',
            'proposta' => 'required|numeric'
        ]);

        $dados = $request->all();
        $inc = Carro:: create($dados);

        if ($inc) {
            return redirect()->
            route('paineis.titulo')->
            with('status', 'Proposta do' . $request->modelo . ' Enviada!');
        }

    }


}
