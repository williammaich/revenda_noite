@extends('user_home')
@section('conteudo')


    <div class="col-sm-2">
        <form method="POST" >
            <ul>
                <li></li>
                <li>Marca: <input type="text" size="10" name="marca"></li>
                <li>Modelo: <input type="text" size="10" name="modelo"></li>
                <li>Ano: <input type="text" size="4" max="4" name="ano"></li>
                <li><input type="submit" value="Buscar">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"></li>
            </ul>
        </form>
    </div>



@endsection

