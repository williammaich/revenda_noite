@extends('user_home')
@section('catalogo')

    <div class="container">

        <h1 style="text-align: center; font-family: 'Fredericka the Great', cursive;">Veiculos a venda</h1>



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
                <td>&nbsp;<br></td>

                    <div class="col-sm-6">
                    {!! "<img src=$foto id='imagem' width='300' height='210' alt='Foto'>" !!}</td>
                          </div>

                <td><h3>Nome:  {{$carro->modelo}}</h3>
                <td><h3>  Marca: {{$carro->marca->nome}}</h3></td>
                <td><h3>Ano:  {{$carro->ano}}</h3></td>
                <td><h3>Preço: {{$carro->preco}}   </h3><br>  </td>

                <td><a href="{{route('propostas.edit' , $carro->id) }}" class="btn btn-warning" role="button">Fazer Proposta</a><br></td>
                <td>&nbsp <br></td>
            </tr>


</tbody>

    @endforeach

    {{$carros->links()}}


    </div>

    @endsection