@extends('titulo')
@section('catalogo')

    <div class="container">

        <h2 style="text-align: center">Veiculos a venda</h2>

@foreach($paineis as $painel)
            <tbody>
            <tr>
                <td> @php
                        if(file_exists(public_path('fotos/' . $painel->id . '.jpg'))){
                        $foto = '../fotos/'.$painel->id . '.jpg';
                        }else{
                        $foto = '../fotos/semfoto.jpg';
                        }


                    @endphp
                    {!! "<img src=$foto id='imagem' width='200' height='130' alt='Foto'>" !!}</td>
                <td>Nome:  {{$painel->modelo}}  Marca: {{$painel->marca->nome}}    Ano:  {{$painel->ano}}  Preço: {{$painel->preco}}            <br>  </td>

                <td><a href="{{Route('painel.store')}}" class="btn btn-warning" role="button">Fazer Proposta</a><br></td>
                <td>&nbsp <br></td>
            </tr>


</tbody>

    @endforeach

    {{$paineis->links()}}


    </div>

    @endsection