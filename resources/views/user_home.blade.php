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


@yield('conteudo')
@yield('catalogo')





<article class="container">
<div class="col-sm-12">

    @if ($acao == 1)
        <h2 style="font-family:  'Fredericka the Great', cursive;text-align: center">Destaques</h2>
    @else
        <h2 style="font-family:  'Fredericka the Great', cursive;text-align: center">Resultado</h2>
    @endif









    <br><hr><br>
    @foreach($carros as $carro)
        <ul>
            @if (file_exists(public_path('fotos/'.$carro->id.'.jpg')))
                <li><a href="{{route('propostas.edit' , $carro->id)}}"><img src="fotos/{{$carro->id}}.jpg" width="300" height="200" alt="carro"></a></li>
            @else
                <li><a><img src="fotos/semfoto.jpg" width="300" height="200" alt="carro"></a></li>

            @endif
            <li>Modelo:{{$carro->modelo}}</li>
            <li>Valor:{{$carro->preco}}</li>

        </ul>


    @endforeach

</div>
</article>
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
