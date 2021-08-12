@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($produto)) Editar @else Cadastrar @endif</h1><hr>
    
    <div class="col-8 m-auto">
                @if(isset($errors) && count($errors)>0)
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach($errors->all() as $erro)
                        {{$erro}}<br>
                    @endforeach
                </div>
            @endif
            @if(isset($produto))
        <form name="formCad" id="formCad" method="post" action="{{url("produtos/$produto->id")}}">
            @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{url('produtos')}}">
        @endif
            @csrf 
            <input class="form-control" type="text" name="title" id="title" placeholder="Nome da peça:" value="{{$produto->nome ?? ''}}" required><br>
            <select class="form-control" name="id_categoria" id="id_categoria" required>
                <option value="{{$produto->relCategorias->id ?? ''}}">{{$produto->relCategorias->nome ?? 'Nome'}}</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                @endforeach
            </select><br>
            <input class="form-control" type="text" name="price" id="price" placeholder="Valor:" value="{{$produto->valor ?? ''}}" required><br>
            <input class="form-control" type="text" name="comp" id="comp" placeholder="Composição:" value="{{$produto->composicao ?? ''}}" required><br>
            <input class="form-control" type="text" name="width" id="width" placeholder="Tamanho da peça (P/M/G/GG):" value="{{$produto->tamanho?? ''}}" required><br>
            <input class="form-control" type="text" name="qtd" id="qtd" placeholder="Quantidade:" value="{{$produto->quantidade ?? ''}}" required><br>
            <input class="btn btn-primary" type="submit" value="@if(isset($produto)) Editar @else Cadastrar @endif" required>
        </form>
    </div>
@endsection