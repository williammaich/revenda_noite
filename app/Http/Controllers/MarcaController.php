<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/arearestrita');
        }



        $marcas = Marca::paginate(3);

        return view('marcas_list', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/arearestrita');
        }
        // 1: indica inclusão
        $acao = 1;

        $marcas = Marca::orderBy('nome')->get();

        return view('marcas_form', compact('acao', 'marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|unique:marcas|min:2|max:60',


        ]);

        // obtém os dados do form
        $dados = $request->all();

        $inc = Marca::create($dados);

        if ($inc) {
            return redirect()->route('marcas.index')
                ->with('status', $request->nome . ' Incluído!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('/arearestrita');
        }
        // posiciona no registro a ser alterado e obtém seus dados
        $reg = Marca::find($id);

        $acao = 2;

        $marcas = Marca::orderBy('nome')->get();

        return view('marcas_form', compact('reg', 'acao', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => ['required', 'unique:marcas' . $id, 'min:2', 'max:60'],


        ]);

        // obtém os dados do form
        $dados = $request->all();

        // posiciona no registo a ser alterado
        $reg = Marca::find($id);

        // realiza a alteração
        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('marcas.index')
                ->with('status', $request->nome . ' Alterado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mar = Marca::find($id);
        if ($mar->delete()) {
            return redirect()->route('marcas.index')
                ->with('status', $mar->nome . ' Excluído!');
        }
    }
}
