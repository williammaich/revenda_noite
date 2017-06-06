@extends('user_home')

@section('conteudo')

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
                        {!!"<img src=$foto id='imagem' width='400' height='300' alt='foto'>"!!}
                    </div>

                    </div>

                    <div class="col-sm-6">
                        <h2>Detalhes</h2>

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
                                                   size="25" maxlength="30">
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

@endsection