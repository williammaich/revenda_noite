
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Loja revenda herbie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Revenda Herbie</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/catalogo')}}">Carros</a></li>
            <li><a href="#">Marcas</a></li>
            <li><a href="#">Propostas</a></li>
        </ul>
    </div>

</nav>
<div class="container">
    <div class="col-sm-3" alt="Fusca herbie">
        <img src="fotos/heb.jpg" alt="Herbie" height="200px">


    </div>
    <div class="col-sm-7">
        <h1 style="text-align: center">Revenda Herbie</h1>
        <h3 style="text-align: center">Os melhores preços da cidade</h3>
    </div>

</div>

<div class="container">
    <div class="col-sm-9">
        <h2 style="text-align: center">Veiculos em destaque</h2>
@yield('catalogo')
@yield('cont')




    </div>
</div>


@yield('marcass')



</body>
</html>
