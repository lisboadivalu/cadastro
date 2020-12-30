@extends('layout.app', ["current" => "Cadastro de Produtos"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="{{route('produtos.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <h2>Cadastro de Produto</h2>
                <div class="top">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto">
                </div>
                <div class="top">
                    <label for="precoProduto">Preco do Produto</label>
                    <input type="text" class="form-control" name="precoProduto" id="precoProduto">
                </div>
                <div class="top">
                    <label for="nomeCategoria">Categoria do Produto</label>
                    <div>
                        <select class="custom-select nomeCategoria" name="nomeCategoria" id="nomeCategoria">
                            @foreach ($categoria as $c)
                            <option value="{{$c['id']}}">{{$c['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="bts">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection