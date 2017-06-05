@extends('user_home')

@section('conteudo')

    <section class="col-sm-12">

        @if (session('status'))
            <div class="alert alert-success">
                <p style="text-align: center">{!! session('status') !!}</p>
            </div>
        @endif
        <hr><br>
        <div class="col-sm-1"></div>
        <div class="col-sm-2">
            <img src="Images/busca.png" width="100%" height="150%">
            <form method="POST" action="{{route('carros.filtros')}}">
                {{csrf_field()}}
                <ul>
                    <li></li>
                    <li>Marca: <input type="text" size="10" name="marca"></li>
                    <li>Modelo: <input type="text" size="10" name="modelo"></li>
                    <li>Ano: <input type="text" size="4" max="4" name="ano"></li>
                    <li>Preço Maximo R$: <input type="text" size="8" max="7" name="precomax" id="precomax"></li>
                    <li><input type="submit" value="Buscar">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"></li>
                </ul>
            </form>
        </div>

        <div class="col-sm-1"></div>
        <div class="col-sm-9">
            <img src="Images/logoempresa.jpg" width="65%">
        </div>

    </section>
    <article class="col-sm-12">
        <br><hr><br>
        @foreach($carros as $carro)
            <ul>
                @if (file_exists(public_path('fotos/'.$carro->id.'.jpg')))
                    <li><a href="{{route('proposta.edit', $carro->id)}}"><img src="fotos/{{$carro->id}}.jpg" width="300" height="200" alt="carro"></a></li>
                @else
                    <li><a href="{{route('proposta.edit', $carro->id)}}"><img src="fotos/sem_foto.jpg" width="300" height="200" alt="carro"></a></li>
                @endif
            </ul>
        @endforeach
    </article>
@endsection