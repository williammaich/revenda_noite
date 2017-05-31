<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Marca;
use App\Carro;

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
        $marca = $request->marca;

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



}
