<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;
use App\Marca;
class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Carro::all();

        return view('carros_list', compact('carros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acao = 1;

        $marcas = Marca::orderBy('nome')->get();

        return view('carros_form', compact('acao','marcas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'modelo' => 'required|min:2|max:60',
            'ano' => 'required|numeric|size:4',
            'cor' => 'min:4|max:40'
        ]);

        $dados = $request->all();
        $inc = Carro:: create($dados);

        if ($inc) {
            return redirect()->
            route('carros.index')->
            with('status', $request->modelo . ' Incluido!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $s = new Carro();
        $reg = $s->find($id);
        $marcas = Marca::orderBy('nome')->get();
        $acao = 3;
        return view('carros_form', compact('reg', 'acao', 'marcas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reg = Carro:: find($id);
        $acao = 2;
        $marcas = Marca::orderBy('nome')->get();

        return view('carros_form', compact('reg', 'acao', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $reg = Carro:: find($id);
        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->
            route('carros.index')->
            with('status', $request->modelo . ' Alterado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = Carro::find($id);
        if ($s->delete()) {
            return redirect()->route('carros.index')->with('status', $s->nome . 'Excluido com sucesso');
        }
    }
}