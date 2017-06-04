@extends('usuario.titulo')
@section('catalogo')

    <div class="container">

        <h2 style="text-align: center">Veiculos pesquisados </h2>
        <div class='col-sm-12'>

            <form method="post" action="{{route('paineis.filtros')}}">
                {{csrf_field()}}

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="modelo">Modelo do veiculo:</label>
                        <input type="text" class="form-control" id="modelo" name="modelo">
                    </div>
                </div>




                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="precomax">Preço Máximo:</label>
                        <input type="text" class="form-control" id="precomax" name="precomax">
                    </div>

                </div>

                <div class="col-sm-1">
                    <label> &nbsp</label>
                    <div class="form-group">
                        <button typeof="submit" class="btn btn-warning">pesquisar</button>

                    </div>
                </div>
            </form>



            @if (count($paineis)==0)
                <div class="alert alert-danger">
                    Não há carros com os filtros informados...
                </div>
            @endif

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Modelo do Veículo</th>
                    <th>Marca</th>
                    <th>Cor</th>
                    <th>Ano</th>
                    <th>Preço R$</th>
                    <th>Combustível</th>

                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paineis as $painel)
                    <tr>
                        <td style="text-align: center">{{$painel->id}}</td>
                        <td>{{$painel->modelo}}</td>
                        <td>{{$painel->marca->nome}}</td>
                        <td>{{$painel->cor}}</td>
                        <td>{{$painel->ano}}</td>
                        <td style="text-align: right">{{number_format($painel->preco, '2', ',', '.')}} &nbsp;&nbsp;&nbsp;</td>
                        <td>{{$painel->combustivel}}</td>

                        <td>
                            <a href="{{route('carros.edit', $painel->id)}}"
                               class="btn btn-warning"
                               role="button">Alterar</a> &nbsp;&nbsp;
                            <form style="display: inline-block"
                                  method="post"
                                  action="{{route('carros.destroy', $painel->id)}}"
                                  onsubmit="return confirm('Confirma Exclusão?')">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <button type="submit"
                                        class="btn btn-danger"> Excluir </button>
                            </form> &nbsp;&nbsp;
                            <a href="{{route('carros.foto', $painel->id)}}"
                               class="btn btn-info"
                               role="button">Foto</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            {{$paineis->links()}}
        </div>



    </div>

    @endsection