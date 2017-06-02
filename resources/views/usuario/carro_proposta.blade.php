@extends('titulo')
@section('catalogo')

    <div class="container">

        <h2 style="text-align: center">Proposta dos veiculos</h2>

        <form method="post" action="{{route ('paineis.store')}}">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome"  value="" required>
        </div>


        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="">
        </div>


        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="" required>
        </div>

        <div class="form-group">
            <label for="proposta">Proposta:</label>
            <input type="text" class="form-control" id="proposta" name="proposta"  value="" required>
        </div>



        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-warning">Limpar</button>


        </form>
    </div>

    <script>
        $(document).ready(function(){
            $('#preco').mask("#.###.##0,00", {reverse: true});
        });
    </script>

    @endsection