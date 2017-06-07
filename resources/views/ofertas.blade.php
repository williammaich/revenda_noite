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
        <img src="public/fotos/heb.jpg" width="300" height="200">
    </div>
    <div class="col-sm-6"><h1 style="text-align: right;  font-family: 'Fredericka the Great', cursive;">Os melhores preços da cidade</h1></div>
    <div class="col-sm-6"><h1 style="text-align: right; font-family:  'Fredericka the Great', cursive;"   >Confie no fusca!!</h1></div>
</section>
</body>
    <div class="container">

        @if ($acao == 2)
            <section class="col-sm-6">
                @else
                    <section class="col-sm-12">
                        @endif
                  <hr>



<div class="col-sm-6">
    <br>
    @php
        if(file_exists(public_path('fotos/'.$reg->id.'.jpg'))){
            $foto = '/fotos/'.$reg->id.'.jpg';
        } else {
            $foto = '/fotos/sem_foto.jpg';
        }
    @endphp
    {!!"<img src=$foto id='imagem' width='400' height='300' alt='foto'>"!!}
</div>



<div class="col-sm-14">
    <h2 style="text-align: center; font-family: 'Fredericka the Great', cursive;">Detalhes</h2>

    <hr>
    <h3>Marca: {{$reg->marca->nome}}</h3>
    <hr>
    <h3>Modelo: {{$reg->modelo}}</h3>
    <hr>
    <h3>ano: {{$reg->ano}}</h3>
    <hr>
    <h3>Combustivel: {{$reg->combustivel}}</h3>
    <hr>
    <h3 style="text-align: center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preço R$: {{$reg->preco}}</h3>

    @if ($acao == 1)
</div>

        <div class="col-sm-12">

            <form method="post" action="{{route('propostas.store')}}">
                {{csrf_field()}}
                <input type="hidden" name="carro_id" id="carro_id"
                       value="{{$reg->id}}">
                <p>Nome: <input type="text" name="nome"
                                size="25" maxlength="25">

                <p> Telefone: <input type="text" name="telefone"
                                     size="25" maxlength="25">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    E-mail: <input type="email" name="email"
                                   size="25" maxlength="40">
                </p>
                <p>Valor: <input type="text" maxlength="6" name="preco"
                                 id="precomax"  value="{{$reg->preco or old('preco')}}">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit"
                           value="Enviar">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset"
                           value="Limpar"></p>
            </form>

        </div>



    @endif
    <hr>


    <hr>
    </section>
    @if ($acao == 2)
        <div class="col-sm-6">
            <hr>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>código</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Valor</th>
                    <th>Data Cad</th>
                </tr>
                </thead>
                <tbody>
                @foreach($proposta as $prop)
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
        </section>
    @endif
</div>



<footer class="col-sm-12">

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
