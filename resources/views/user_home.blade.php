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
            <li><a>Catalogo </a>&nbsp;&nbsp; |</li>
            <li><a>Marcas </a>&nbsp;&nbsp; |</li>
            <li><a>Pesquisas</a></li>
        </ul>
        <hr>
    </div>
</header>
<section class="col-sm-12">
    <hr><br>
    <div class="col-sm-1"></div>
    <div class="col-sm-2">
        <form method="POST" >
            <ul>
                <li></li>
                <li>Marca: <input type="text" size="10" name="marca"></li>
                <li>Modelo: <input type="text" size="10" name="modelo"></li>
                <li>Ano: <input type="text" size="4" max="4" name="ano"></li>
                <li><input type="submit" value="Buscar">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"></li>
            </ul>
        </form>
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-9">
        <img src="fotos/heb.jpg" width="65%">
    </div>
</section>
<article class="col-sm-12">
    <h2>Destaques</h2>
    <br><hr><br>
    @foreach($carros as $carro)
        <ul>
            @if (file_exists(public_path('fotos/'.$carro->id.'.jpg')))
                <li><a href="{{route('proposta.edit', $carro->id)}}"><img src="fotos/{{$carro->id}}.jpg" width="300" height="200" alt="carro"></a></li>
            @else
                <li><a><img src="fotos/semfoto.jpg" width="300" height="200" alt="carro"></a></li>
            @endif
        </ul>
    @endforeach
</article>
<footer class="col-sm-12">
    <br><hr><br>
</footer>
</body>
</html>
