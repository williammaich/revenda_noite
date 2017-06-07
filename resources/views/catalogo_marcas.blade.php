@extends('user_home')
@section('conteudo')
<div><br>
<br>
<br>
</div>
    <div class="container">

        @foreach($marcas as $marca)

            <a href="#" class="btn btn-warning" role="button">{{$marca->nome}}</a>

        @endforeach




    </div>




@endsection