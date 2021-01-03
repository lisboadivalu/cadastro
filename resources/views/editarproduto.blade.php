@extends('layout.app', ["current" => "Editar Produto"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="{{ route('produtos.update', $produto['id']) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <h2>Dados do Produto</h2>
                <div class="top">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control {{$errors->has('nomeProduto') ? 'is-invalid' : ''}}" name="nomeProduto" placeholder="{{$produto['name']}}">
                    @if ($errors->has('nomeProduto'))
                        {{$errors->first('nomeProduto')}}
                    @endif
                </div>
                <div class="top">
                    <label for="precoProduto">Preco do Produto</label>
                    <input type="text" class="form-control {{$errors->has('precoProduto') ? 'is-invalid' : ''}} " name="precoProduto" placeholder="R$ {{$produto['preco']}}">
                    @if ($errors->has('precoProduto'))
                        {{$errors->first('precoProduto')}}
                    @endif
                </div>
                <div class="top">
                    <label for="nomeCategoria">Categoria</label>
                    <select class="custom-select nomeCategoria {{$errors->has('precoProduto') ? 'is-invalid' : ''}} " name="nomeCategoria" id="nomeCategoria">
                        @foreach ($categoria as $c)
                            <option value="{{$produto['categoria_id']}}">{{$c['name']}}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('nomeCategoria'))
                        {{$errors->first('nomeCategoria')}}
                    @endif
                </div>
                <div class="bts">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="submit" class="btn btn-danger btn-sm"><a href="{{route('produtos.index')}}">Cancelar</a></button>
                </div>    
            </div>
        </form>
    </div>
</div>


@endsection