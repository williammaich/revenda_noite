@extends('principal')

@section('conteudo')

    <div class="col-sm-11">
        <h2>Propostas Clientes (Realizadas) </h2>
    </div>

    <div class="col-sm-12" style=" text-align: center">
        <p>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            </p>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>cod</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Valor</th>
                <th>Data Cad</th>
            </tr>
            </thead>
            <tbody>
            @foreach($propostas as $prop)
                <tr>
                    <td>{{$prop->id}}</td>
                    <td>{{$prop->nome}}</td>
                    <td>{{$prop->telefone}}</td>
                    <td>{{$prop->email}}</td>
                    <td>{{number_format($prop->preco, '2', ',', '.')}}</td>
                    <td>{{date_format ($prop->created_at, 'd/m/Y')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection