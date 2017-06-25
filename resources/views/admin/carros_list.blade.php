@extends('admin.principal')

@section('conteudo')

   <div class="col-sm-10">

       <h2> Cadastro de Carros </h2>

   </div>

   <div class="col-sm-12">

       <td><a href="{{route('carros.create')}}" class="btn btn-primary" role="button">Cadastrar veiculo</a></td>

   </div>
<div class="col-sm-12">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>

<div class="col-sm-12">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Código</th>
            <th>Foto</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Cor</th>
            <th>Ano</th>
            <th>Preço R$</th>
            <th>Combustivel</th>
            <th>Data cad.</th>
            <th>Ações</th>

        </tr>
        </thead>
        <tbody>
        @foreach($carros as $carro)

            <tr>
                <td>{{$carro->id}}</td>
                <td></td>
                <td>{{$carro->modelo}}</td>
                <td>{{$carro->marca->nome}}</td>
                <td>{{$carro->cor}}</td>
                <td>{{$carro->ano}}</td>
                <td style="text-align: right";>{{number_format($carro->preco, '2', ',', '.')}}</td>
                <td>{{$carro->combustivel}}</td>
                <td>{{date_format($carro->created_at, 'd/m/y')}}</td>
                <td>

                <td>
                    <button type="button" class="btn btn-primary">Ver</button>
                    <button type="button" class="btn btn-warning"><a href="{{route('carros.edit', $carro->id)}}" class="action edit" style="color: white; text-decoration: none;" >Editar</a></button>


                    <form style="display: inline-block;" method="post" action="{{route('carros.destroy', $carro->id)}}" onsubmit="return confirm('Confirma Exclusão?')">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>

                <a href="{{route('carros.foto', $carro->id)}}" class="btn btn-info" role="button">Foto</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $carros->links() }}
</div>





    @endsection