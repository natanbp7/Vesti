@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>

    <div class="col-8 m-auto">
        @php
            $categoria=$produto->find($produto->id)->relCategorias;
        @endphp
        Categoria: {{$categoria->nome}}<br>
        Nome: {{$produto->nome}}<br>
        Preço: R$ {{$produto->valor}}<br>
        Composição: {{$produto->composicao}}<br>
        Data cadastro: {{$produto->created_at}} <br>
        Tamanho: {{$produto->tamanho}} <br>
        Quantidade: {{$produto->quantidade}} <br>
    </div>
@endsection