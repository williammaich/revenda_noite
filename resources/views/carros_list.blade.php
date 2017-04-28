@extends('principal')
@section('conteudo')

<div class="col-sm-11">
    <h2>Cadastro de carros</h2>
    
</div>

<div class="col-sm-1">
    <a href="{{route('carros.create')}}" class="btn btn-primary" role="button">Novo</a>
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
          <th>Veículo</th>
          <th>Marca</th>
          <th>Cor</th>
          <th>Ano</th>
          <th>Combustivel</th>
          <th>Preço R$</th>
        
        <th>Data Cad</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($carros as $carro)
      <tr>
          
          <td style="text-align: center">{{$carro->id}}</td>
          <td>{{$carro->modelo}}</td>
          <td>{{$carro->marca->nome}}</td>
          <td>{{$carro->cor}}</td>
          <td>{{$carro->ano}}</td>
          <td>{{$carro->combustivel}}</td>
          <td style="text-align: right">{{number_format($carro->preco, '2', ',' ,'.') }} &nbsp;&nbsp;&nbsp;</td>
          <td>{{date_format($carro->created_at, 'd/m/Y')}}</td>
          <td>&nbsp;
              <a href="{{route('carros.edit',$carro->id)}}" class="btn btn-warning" role="button">Alterar</a>
              <a href="{{route('carros.show' , $carro->id)}}" class="btn btn-info" role="button">Ver</a>
              <form style="display: inline-block;" method="POST" action="{{route('carros.destroy', $carro->id)}}"
                    onsubmit="return confim('Confirma a exclusão?')">
                  {{method_field('DELETE')}}
                  {{csrf_field()}}
                  <button type="submit" class="btn btn-danger">Excluir</button>
              </form>
          </td>

          
          
          
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
    

@endsection