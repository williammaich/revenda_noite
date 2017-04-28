<!DOCTYPE html>
<html lang="en">
<head>
  <title>Revenda Herbie</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
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
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastro <span class="caret"></span></a>
        <ul class="dropdown-menu">
             <li><a href="{{route('carros.index')}}">Carros</a></li>
      <li><a href="#">Marcas</a></li>
      <li><a href="#">...</a></li>
        </ul>
      </li>
       <li><a href="#">Pesquisa</a></li>
  <li><a href="#"></a>Relatorio</li>
  <li><a href="#"></a>Utilitário</li>
    </ul>
  </div>
</nav>
  
<div class="container">
@yield('conteudo')
</div>

</body>
</html>





