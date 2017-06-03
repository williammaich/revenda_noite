<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Carro;
use App\Proposta;

class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $propostas = Proposta::all();

        return view('propostas_list', compact('propostas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carros = Carro::where('destaque', '=', 1)
            ->orderBy('modelo')
            ->simplePaginate(5);
        return view('clientePag', compact('carros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $inc = Proposta::create($dados);
        if ($inc) {
            return redirect()->route('carros.destaque')
                ->with('status', 'Proposta realizada com sucesso');
        }
    }

    /**
     * Display the specified resource to make propose.
     *
     * @param  int  $id from carros
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reg = Carro::find($id);
        $proposta = Proposta::all();
        $acao = 2;
        return view('oferta', compact('reg', 'proposta' , 'acao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reg = Carro::find($id);

        $acao = 1;

        return view('oferta', compact('reg','acao'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function graf() {
        $propostas = DB::table('propostas')
            ->select(DB::raw('MONTHNAME(DATE(created_at)) as date'), DB::raw('count(*) as num'))
            ->groupBy('date')
            ->get();
        return view('propostas_graf', compact('propostas'));
    }
}

