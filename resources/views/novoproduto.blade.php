@extends('layout.app', ["current" => "Cadastro de Produtos"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="{{route('produtos.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <h2>Cadastro de Produto</h2>
                
                <label for="nomeProduto">Nome do Produto</label>
                <input type="text" class="form-control" name="nomeProduto" id="nomeProduto">
                <label for="precoProduto">Preco do Produto</label>
                <input type="text" class="form-control" name="precoProduto" id="precoProduto">
                <label for="nomeCategoria">Categoria</label>
                <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria">
                <div class="bts">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection