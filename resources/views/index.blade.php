@extends('templates.template')
@can ('user')
@section('content')
    <h1 class="text-center mt-5 mb-4">Controle produtos  - Vesti</h1>
<div class="text-center mt-3 mb-4">
    <a href="{{url('produtos/create')}}">
        <button class="btn btn-success">Cadastrar</button>
    </a>
</div>
    <div class="col-8 m-auto">
    @csrf
    <table class="table table-hover text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Categoria</th>
      <th scope="col">Nome</th>
      <th scope="col">Tamanho</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Valor</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
   @foreach($produto as $produtos)
        @php
            $categoria=$produtos->find($produtos->id)->relCategorias;
        @endphp
      <tr>
      <th scope="row">{{$produtos->id}}</th>
      <td>{{$categoria->nome}}</td>
      <td>{{$produtos->nome}}</td>
      <td>{{$produtos->tamanho}}</td>
      <td>{{$produtos->quantidade}}</td>
      <td>{{$produtos->valor}}</td>
      <td>
        <a href="{{url("produtos/$produtos->id")}}">
            <button class="btn btn-dark">Visualizar</button>
        </a>
        <a href="{{url("produtos/$produtos->id/edit")}}">
            <button class="btn btn-primary">Editar</button>
        </a>
        <a href="{{url("produtos/$produtos->id")}}" class="js-del">
            <button class="btn btn-danger">Deletar</button>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    {{$produto->links('pagination::bootstrap-4')}}
    </div>
    @endcan
@endsection