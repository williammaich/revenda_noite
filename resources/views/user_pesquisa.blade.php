@extends('user_home')
@section('conteudo')


    <div class="col-sm-12">
        <form method="POST" action="{{route('carros.filtros3')}}">
            {{csrf_field()}}
            <ul>

                <td><h3>Marca: <input type="text" size="30" name="marca"></h3></td>
                <td><h3>Modelo: <input type="text" size="30" name="modelo"></h3></td>
                <td><h3>Ano: <input type="text" size="4" max="4" name="ano"></h3></td>
                <td><input type="submit" value="Buscar">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"></td>
            </ul>
        </form>

        <div class='col-sm-12'>

            @if (count($carros)==0)
                <div class="alert alert-danger">
                    Não há carros com os filtros informados...
                </div>
            @endif


        </div>




</div>


    <article class="col-sm-6">

        <div class="container">



            @if ($acao == 1)
                <h2 style="font-family:  'Fredericka the Great', cursive;text-align: center">Destaques</h2>
            @else
                <h2 style="font-family:  'Fredericka the Great', cursive;text-align: center">Resultado</h2>
            @endif









            <br><hr><br>
            @foreach($carros as $carro)
                <ul>
                    @if (file_exists(public_path('fotos/'.$carro->id.'.jpg')))
                        <li><a href="{{route('propostas.edit' , $carro->id)}}"><img src="fotos/{{$carro->id}}.jpg" width="300" height="200" alt="carro"></a></li>
                    @else
                        <li><a><img src="fotos/semfoto.jpg" width="300" height="200" alt="carro"></a></li>

                    @endif
                    <li><h4 style="text-align: center">Modelo:{{$carro->modelo}}</h4></li>
                    <li><h4 style="text-align: center">Valor:{{$carro->preco}}</h4></li>

                </ul>


            @endforeach

        </article>


    </div>

@endsection

