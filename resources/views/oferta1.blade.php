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
            <li><a href="{{'/'}}">Home</a></li>
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
    <div class="col-sm-6"><h2 style="text-align: right;  font-family: 'Fredericka the Great', cursive;">Os melhores preços da cidade</h2></div>
    <div class="col-sm-6"><h2 style="text-align: right; font-family:  'Fredericka the Great', cursive;"   >Confie no fusca!!</h2></div>
</section>
    @if ($acao == 2)
        <section class="col-sm-6">
            @else
                <section class="col-sm-12">
                    @endif
                    <hr>
                    </div>
                    <div class="col-sm-6">
                        <br>
                        @php
                            if(file_exists(public_path('fotos/'.$reg->id.'.jpg'))){
                                $foto = '/fotos/'.$reg->id.'.jpg';
                            } else {
                                $foto = '/fotos/sem_foto.jpg';
                            }
                        @endphp
                        {!!"<img src=$foto id='imagem' width='100%' height='100%' alt='foto'>"!!}
                    </div>
                    <div class="col-sm-6">
                        <hr>
                        <h3>Marca: {{$reg->marca->nome}}</h3>
                        <hr>
                        <h3>Modelo: {{$reg->modelo}}</h3>
                        <hr>
                        <h3>ano: {{$reg->ano}}</h3>
                        <hr>
                        <h3>Combustivel: {{$reg->combustivel}}</h3>
                        <hr>
                        <h3>Preço R$: {{$reg->preco}}</h3>

                        @if ($acao == 1)
                            <form method="post" action="{{route('propostas.store')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="carro_id" id="carro_id"
                                       value="{{$reg->id}}">
                                <p>Nome: <input type="text" name="nome"
                                                size="25" maxlength="25">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    E-mail: <input type="email" name="email"
                                                   size="25" maxlength="30">
                                </p>
                                <p>Valor: <input type="text" maxlength="6" name="preco"
                                                 id="precomax">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="submit"
                                           value="Enviar">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="reset"
                                           value="Limpar"></p>
                            </form>
                        @endif
                        <hr>
                    </div>
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

<article class="col-sm-12">
    <div class="container">
        <h2 style="font-family:  'Fredericka the Great', cursive;text-align: center">Destaques</h2>
        <br><hr><br>
        @foreach($carros as $carro)
            <ul>
                @if (file_exists(public_path('fotos/'.$carro->id.'.jpg')))
                    <li><a href="{{route('carros.edita' , $carro->id)}}"><img src="fotos/{{$carro->id}}.jpg" width="300" height="200" alt="carro"></a></li>
                    <li>Modelo:{{$carro->modelo}}</li>
                    <li>Valor:{{$carro->preco}}</li>
                    <li><a><img src="fotos/semfoto.jpg" width="300" height="200" alt="carro"></a></li>
                @endif
            </ul>


        @endforeach
    </div>
</article>
<footer class="col-sm-12">
    <br><hr><br>
</footer>
</body>
</html>
