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

public function loja(){

        $paineis = Marca::orderBy('nome')->get();
        return view('usuario.loja_carros',compact('paineis'));
}


public function catalogo(){
    $paineis = Marca::orderBy('nome')->get();
    return view('usuario.catalogo',compact('paineis'));
}
}
