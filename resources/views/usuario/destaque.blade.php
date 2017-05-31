@extends('titulo')
@section('dest')



    <div class="container">
        <div class="col-sm-9">
            <h2 style="text-align: center">Veiculos em destaque</h2>

            <tbody>
@foreach($paineis as $painel)

              @if($painel->destaque == 1)
                <tr>
                <td>@php

                if(file_exists(public_path('fotos/' . $painel->id . '.jpg'))){
                $foto = '../fotos/'.$painel->id . '.jpg';
                }else{
                $foto = '../fotos/semfoto.jpg';
                }
                @endphp

                   <td> {!! "<img src=$foto id='imagem' width='300' height='210' alt='Foto'>" !!}<br></td>
                    <td>Nome:  {{$painel->modelo}}<br></td>
                    <td>   Marca: {{$painel->marca->nome}}<br></td>
                    <td>  Ano:  {{$painel->ano}} <br></td>
                    <td> Preço: {{$painel->preco}} <br></td>
                    <td>&nbsp<br></td>

                </tr>
                @endif


            </tbody>
    @endforeach
{{$paineis->links()}}


        </div>

    </div>




@endsection