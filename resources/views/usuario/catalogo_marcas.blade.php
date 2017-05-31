@extends('titulo')
@section('marcass')









    <div class="container">
        <div class="col-sm-9">
            <h2 style="text-align: center">Veiculos por marcas</h2>
@foreach($paineis as $painel)

    <a href="{{}}" class="btn btn-warning" role="button">{{$painel->nome}}</a>






@endforeach


        </div>
    </div>

 @endsection