<html>
<head>
    <title>Revenda Herbie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/css.css">
    <link rel="stylesheet" href="/css/clientPage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="{{url('/js/jquery.mask.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#precomax').mask("#.###.##0,00", {reverse: true});
        });
    </script>
</head>
<body>
<header class="col-sm-12">
    <div class="col-sm-5">
        <a><h1 id="logo">REVENDA HERBIE</h1></a>
    </div>
    <div class="col-sm-7">
        <hr>
        <ul>
            <li><a href="{{'/'}}">Home</a>    |</li>
            <li><a href="{{('catalogo')}}">Catalogo </a>&nbsp;&nbsp; |</li>
            <li><a>Marcas </a>&nbsp;&nbsp; |</li>
            <li><a href="{{('user_pesquisa')}}">Pesquisas</a></li>
        </ul>
        <hr>
    </div>
</header>
<section class="col-sm-12">
    <hr><br>
    <div class="col-sm-1"></div>



    <div class="col-sm-2">
        <img src="fotos/heb.jpg" width="300" height="200">
    </div>
    <div class="col-sm-6"><h1 style="text-align: right;  font-family: 'Fredericka the Great', cursive;">Os melhores preços da cidade</h1></div>
    <div class="col-sm-6"><h1 style="text-align: right; font-family:  'Fredericka the Great', cursive;"   >Confie no fusca!!</h1></div>
</section>

    <div class="container">

        <h1 style="text-align: center; font-family: 'Fredericka the Great', cursive;">Veiculos a venda</h1>



        @foreach($carros as $carro)
            <tbody>
            <tr>
                <td> @php
                    if(file_exists(public_path('fotos/' . $carro->id . '.jpg'))){
                    $foto = '../fotos/'.$carro->id . '.jpg';
                    }else{
                    $foto = '../fotos/semfoto.jpg';
                    }


                @endphp
                <td>&nbsp;<br></td>

                <div class="col-sm-6">
                    {!! "<img src=$foto id='imagem' width='300' height='210' alt='Foto'>" !!}</td>
                </div>

                <td><h3>Nome:  {{$carro->modelo}}</h3>
                <td><h3>  Marca: {{$carro->marca->nome}}</h3></td>
                <td><h3>Ano:  {{$carro->ano}}</h3></td>
                <td><h3>Preço: {{$carro->preco}}   </h3><br>  </td>

                <td><a href="{{route('propostas.edit' , $carro->id) }}" class="btn btn-warning" role="button">Fazer Proposta</a><br></td>
                <td>&nbsp <br></td>
            </tr>


            </tbody>

        @endforeach

        {{$carros->links()}}


    </div>

<div class="container">
    <div class="col-sm-12">


    </div>
</div>
<footer class="col-sm-12">
    <br><hr><br>
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <ul class="nav navbar-nav">
                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>




                <li><a href="#">Contatenos           </a></li>
                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
                <li><a href="#">Venha trabalhar conosco</a></li>
                <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;|</a></li>
                <li><a href="#">Termos de uso</a></li>

            </ul>
        </div>
    </nav>
</footer>
</body>
</html>
