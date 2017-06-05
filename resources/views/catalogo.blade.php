@extends('user_home')
@section('catalogo')

    <div class="container">

        <h2 style="text-align: center; font-family: 'Fredericka the Great', cursive;">Veiculos a venda</h2>



@foreach($carros as $carro)
            <tbody>
            <tr>
                <td> @php
                        if(file_exists(public_path('fotos/' . $carro->id . '.jpg'))){
                        $foto = '../fotos/'.$carro->id . '.jpg';
                        }else{
                        $foto = '../fotos/semfoto.jpg';
                        }


                    @endphp
                    {!! "<img src=$foto id='imagem' width='200' height='130' alt='Foto'>" !!}</td>
                <td>Nome:  {{$carro->modelo}}  Marca: {{$carro->marca->nome}}    Ano:  {{$carro->ano}}  Preço: {{$carro->preco}}            <br>  </td>

                <td><a href="{{('carro_prop/') }}" class="btn btn-warning" role="button">Fazer Proposta</a><br></td>
                <td>&nbsp <br></td>
            </tr>


</tbody>

    @endforeach

    {{$carros->links()}}


    </div>

    @endsection