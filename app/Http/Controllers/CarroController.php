<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
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
        if (!Auth::check()) {
            return redirect('/');
        }

        // $carros = Carro::all();
        if (!Auth::check()) {
            return redirect('/');
        }

        $carros = Carro::paginate(3);

        return view('carros_list', compact('carros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(Auth::check())) {
            return redirect('/arearestrita');
        }
        $acao = 1;
        $marcas = Marca::orderBy('nome')->get();
        return view("carros_form", compact('acao', 'marcas'));
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
            'modelo' => 'required|unique:carros|min:2|max:60',
            'ano' => 'required|numeric|min:1970|max:2020',
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
        $reg = Carro::find($id);
        $acao = 3;
        return view('carros_form', compact('reg','acao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('/arearestrita');
        }
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
        $this->validate($request, [
            'modelo' => ['required', 'unique:carros,modelo,' . $id, 'min:2', 'max:60'],
            'ano' => 'required|numeric|min:1970|max:2020',
            'cor' => 'min:4|max:40'
        ]);


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

    public function foto($id)
    {
        $reg = Carro:: find($id);
        $marcas = Marca::orderBy('nome')->get();

        return view('carros_foto', compact('reg', 'acao', 'marcas'));
    }

    public function storeFoto(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/arearestrita');
        }

        $dados = $request->all();
        $id = $dados['id'];
        if (isset($dados['foto'])) {
            $fotoId = $id . '.jpg';
            $request->foto->move(public_path('fotos'), $fotoId);
        }


        return redirect()->
        route('carros.index')->
        with('status', $request->modelo . ' com foto cadastrado!');


    }


    public function pesq()
    {
        // verifica se (não) está autenticado
        if (!Auth::check()) {
            return redirect('/arearestrita');
        }
//        $carros = Carro::all();
        $carros = Carro::paginate(3);
        return view('carros_pesq', compact('carros'));
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

        $carros = Carro::where($filtro)
            ->orderBy('modelo')
            ->paginate(3);

        return view('carros_pesq', compact('carros'));
    }


    public function filtros3(Request $request) {

        $modelo = $request->modelo;
        $value = $request->precomax;
        $marca = $request->marca;
        $ano = $request->ano;

        $novo1 = str_replace('.', '', $value);
        $novo2 = str_replace(',', '.', $novo1);
        $precomax = $novo2;

        $filtro = array();

        if (!empty($modelo)) {
            array_push($filtro, array('modelo', 'like', '%'.$modelo.'%'));
        }
        if (!empty($precomax)) {
            array_push($filtro, array('preco', '<=', $precomax));
        }
        if (!empty($marca)) {
            array_push($filtro, array('marca_id', '=', $this->marcasGetId($marca)));
        }
        if (!empty($ano)) {
            array_push($filtro, array('ano', '=', $ano));
        }
        $carros = carro::where($filtro)
            ->orderBy('modelo')
            ->paginate(3);
       $acao = 2;
        return view('user_pesquisa', compact('acao','carros', 'ex'));
    }






    public function filtros2(Request $request)
    {
        $modelo = $request->modelo;
        $precomax = $request->precomax;

        $carros = Carro::where('modelo', 'like', '%' . $modelo . '%')
            ->where('preco', '<=', $precomax)
            ->orderBy('modelo')
            ->paginate(3);

        return view('carros_pesq', compact('carros'));
    }

    public function graf() {
        $carros = DB::table('carros')
            ->join('marcas', 'carros.marca_id', '=', 'marcas.id')
            ->select('marcas.nome as marca', DB::raw('count(*) as num'))
            ->groupBy('marcas.nome')
            ->get();
        return view('carros_graf', compact('carros'));
    }

    public function enviaMail(){
        $destinatario = "williammaich@hotmail.com";
        Mail::to($destinatario)->subject("Promoção de Aniversário")
            ->send(new AvisoPromocao());
    }

    public function destaque() {

        $carros = Carro::where('destaque', '=' ,1)
            ->orderBy('modelo')
            ->paginate(3);
             $acao = 1;
        return view('user_home', compact('acao','carros'));

    }

    public function oferta($id) {
        $reg = Carro::find($id);

        return view('oferta', compact('reg'));
    }




    public function storedestaque($id) {
        $reg = Carro::find($id);
        if ($reg->destaque == 0) {
            DB::table('carros')
                ->where('id', $id)
                ->update(['destaque' => 1]);
        } else {
            DB::table('carros')
                ->where('id', $id)
                ->update(['destaque' => 0]);
        }
        return redirect()->route('carros.destaque');
    }

    public function marcasGetId($marca) {
        $marcas = Marca::all();
        foreach ($marcas as $marc) {
            if ($marc->nome == $marca) {
                $marca_Id = $marc->id;
                return $marca_Id;
            }
        }
    }


    public function pesquisar()
    {

        $carros = Carro::paginate(5);
        $acao = 2;
        return view('user_pesquisa', compact('acao','carros'));
    }




    public function mostrar(){

        $carros = Carro::paginate(5);
        $acao = 1;
        return view('catalogo', compact('acao','carros'));
    }


    public function edita($id)
    {
        $reg = Carro::find($id);

        $acao = 1;

        return view('oferta', compact('reg','acao'));
    }



    public function catalogo_marcas(){

        $marcas = Marca::orderBy('nome')->get();
       $carros = Carro::where('destaque', '=' ,1)
            ->orderBy('modelo')
            ->paginate(3);
        $acao = 1;

        return view('catalogo_marcas', compact('acao','carros','marcas'));
    }

}
