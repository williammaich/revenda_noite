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

    $paineis = Marca::orderBy('nome')->get();


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

        return view('usuario.catalogo', compact('reg', 'acao', 'paineis'));
    }






public function catalogo_marcas(){

    $paineis = Marca::orderBy('nome')->get();


    return view('usuario.catalogo_marcas', compact('paineis'));
}




}
