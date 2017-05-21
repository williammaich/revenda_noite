@extends('principal')
@section('conteudo')

    <div class="col-sm-11">
        <h2>Cadastro de Marcas</h2>

    </div>

    <div class="col-sm-1">
        <a href="{{route('marcas.create')}}" class="btn btn-primary" role="button">Novo</a>
    </div>

    <div class="col-sm-12">


        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Código</th>
                <th>Marca</th>
                <th>Pais</th>

                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marcas as $marca)
                <tr>

                    <td style="text-align: center">{{$marca->id}}</td>
                    <td>{{$marca->nome}}</td>
                    <td>{{$marca->pais}}</td>


                    <td>&nbsp;
                        <a href="{{route('marcas.edit',$marca->id)}}" class="btn btn-warning" role="button">Alterar</a>
                        <a href="{{route('marcas.show' , $marca->id)}}" class="btn btn-info" role="button">Ver</a>
                        <form style="display: inline-block;" method="POST" action="{{route('marcas.destroy', $marca->id)}}"
                              onsubmit="return confirm('Confirma a exclusão?')">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>

                    </td>
                </tr>



            @endforeach
            </tbody>
        </table>
            {{$marcas->links()}}
    </div>


@endsection
