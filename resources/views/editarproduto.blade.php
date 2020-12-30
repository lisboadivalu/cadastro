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
                    <input type="text" class="form-control" name="nomeProduto" placeholder="{{$produto['name']}}">
                </div>
                <div class="top">
                    <label for="precoProduto">Preco do Produto</label>
                    <input type="text" class="form-control" name="precoProduto" placeholder="R$ {{$produto['preco']}}">
                </div>
                <div class="top">
                    <label for="nomeCategoria">Categoria</label>
                    <select class="custom-select nomeCategoria" name="nomeCategoria" id="nomeCategoria">
                        @foreach ($categoria as $c)
                            <option value="{{$produto['categoria_id']}}">{{$c['name']}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="bts">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </div>    
            </div>
        </form>
    </div>
</div>


@endsection