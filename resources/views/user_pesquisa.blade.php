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



@endsection

