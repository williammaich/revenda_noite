
@extends('principal')
@section('conteudo')

    <script src="{{url('/js/jquery.mask.min.js')}}"></script>

    <div class="col-sm-11">
       <h2>Cadastro de Fotos dos Carros</h2>
    </div>

    <div class="col-sm-1">
        <a href="{{route('carros.index')}}" class="btn btn-primary" role="button">Voltar</a>
    </div>

    <form method="post" action="{{route('carros.store.foto')}}"
    enctype="multipart/form-data">
        {{csrf_field()}}
    <div class="col-sm-9">

        <div class="form-group">
            <label for="modelo">Modelo do veiculo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo"  value="{{$reg->modelo or old('modelo')}}" required>
        </div>

                <div class="form-group">
                    <label for="marca_id">Marca:</label>
                    <select class="form-control" id="marca_id" name="marca_id" >

                        @foreach($marcas as $m)

                        <option value="{{$m->id}}"
                                @if ((isset($reg) && $reg->marca_id == $m->id) or old('marca_id') == $m->id)selected @endif
                        >{{$m->nome}}</option>
                        @endforeach

                    </select>
                </div>



        <div class="form-group">
            <label for="cor">Cor do veiculo:</label>
            <input type="text" class="form-control" id="cor" name="cor" value="{{$reg->cor or old('cor')}}" required>
        </div>

        <div class="form-group">
            <label for="ano">Ano do veiculo:</label>
            <input type="text" class="form-control" id="ano" name="ano" value="{{$reg->ano or old('ano')}}" required>
        </div>


        <div class="form-group">
            <label for="preco">Preço do veiculo:</label>
            <input type="text" class="form-control" id="preco" name="preco" value="{{$reg->preco or old('preco')}}" required>
        </div>


        <div class="form-group">
            <label for="combustivel">Tipo de Combustivel:</label>
            <select class="form-control" id="combustivel" name="combustivel" >
                <option value="A"
                @if ((isset($reg) && $reg->combustivel == "Álcool") || old('combustivel') == "A")selected @endif
                >Álcool</option>
                <option value="G"
                        @if ((isset($reg) && $reg->combustivel == "Gasolina") || old('combustivel') == "G")selected @endif
                >Gasolina</option>
                <option value="D"
                        @if ((isset($reg) && $reg->combustivel == "Diesel") || old('combustivel') == "D")selected @endif
                >Diesel</option>
                <option value="F"
                        @if ((isset($reg) && $reg->combustivel == "Flex") || old('combustivel') == "F")selected @endif
                >Flex</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-warning">Limpar</button>



    </div>

        <div class= "col-sm-3" style="text-align: center">

          @php
            if(file_exists(public_path('fotos/' . $reg->id . '.jpg'))){
            $foto = '../fotos/'.$reg->id . '.jpg';
            }else{
            $foto = '../fotos/semfoto.jpg';
            }


            @endphp
            {!! "<img src=$foto id='foto' width='200' height='150' alt='Foto'>" !!}

            <div class="form-group">
                <label for="foto">Foto: </label>
                <input type="file" id="foto" name="foto" class="form-control">
            </div>
        </div>


    </form>
<script>
    $(document).ready(function(){
        $('#preco').mask("#.###.##0,00", {reverse: true});
        });
</script>

@endsection
