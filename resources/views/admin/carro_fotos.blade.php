@extends('admin.principal')

@section('conteudo')

    <script src="{{url('/js/jquery.mask.min.js')}}"></script>

    <div class="row">
        <div class="col-sm-11">



        </div>
        <div class="col-sm-1">
            <a href="{{url('/carros')}}" class="btn btn-primary" role="button"> Voltar </a>
        </div>
    </div>

<form method="post" action="{{route('carros.store.foto')}}" enctype="multipart/form-data">

        {{ csrf_field() }}

    <input type="hidden" name="id" value="{{$reg->id}}">

        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" id="modelo" value="{{$carro->modelo or old('modelo')}}" name="modelo" placeholder="Modelo do Veiculo">
        </div>

    <div class="form-group">
        <label for="marca_id">Marca:</label>
        <select class="form-control" id="marca_id" name="marca_id">

            @foreach($marcas as $m)

                <option value="{{$m->id}}"
                        @if((isset($reg) and $reg->marca_id == $m->id) or old('marca_id') == $m->id) selected
                        @endif> {{$m->nome}}
                </option>

                @endforeach
        </select>


    </div>

        <div class="form-group">
            <label for="ano">Ano:</label>
            <input type="text" class="form-control" id="ano" value="{{$carro->ano or old('ano')}}" name="ano" placeholder="Ano do Veiculo">
        </div>

        <div class="form-group">
            <label for="cor">Cor:</label>
            <input type="text" class="form-control" id="cor" value="{{$carro->cor or old('cor')}}" name="cor" placeholder="Cor do Veiculo" style="width: 150px;">
        </div>

        <div class="form-group">
            <label for="preco">Preço R$:</label>
            <input type="text" class="form-control" id="preco" value="{{$carro->preco or old('preco')}}" name="preco" placeholder="Preço">
        </div>

        <div class="form-group">
            <label for="combustivel">Combustivel:</label>
            <select class="form-control" id="combustivel" name="combustivel">

                <option value="A" @if ((isset($carro) && $carro->combustivel == "ALCOOL") || old('combustivel') == "A") selected @endif>ALCOOL</option>
                <option value="G" @if ((isset($carro) && $carro->combustivel == "GASOLINA") || old('combustivel') == "G") selected @endif>GASOLINA</option>
                <option value="D" @if ((isset($carro) && $carro->combustivel == "DIESEL") || old('combustivel') == "D") selected @endif>DIESEL</option>
                <option value="F" @if ((isset($carro) && $carro->combustivel == "FLEX") || old('combustivel') == "F") selected @endif>FLEX</option>

            </select>


        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-warning">Limpar</button>
    </div>

    <div class="col-sm-3">

        @php

        if (file_exists(public_path('fotos/'.$reg->id.'.jpg'))){
        $foto = '../fotos/'.$reg->id.'.jpg';
        }else{
        $foto = '../fotos/sem-foto.jpg';
        }

        @endphp

        {!!"<img src=$foto id='imagem' width='200' height='150' alt='foto'>"!!}
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto"
            onchange="previewFile()" class="form-control">

        </div>

    </div>
    </form>

    <script>

        function previewFile() {
            var preview = document.getElementById('imagem');
            var file = document.getElementById('foto').files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;

            };

            if(file){
                reader.readAsDataURL(file);

            }else{
                preview.src = "";
            }

        }


        $(document).ready(function(){
            $('#preco').mask("#.###.##0,00", {reverse: true});
        });



    </script>



    @endsection