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
                    <input type="text" class="form-control {{$errors->has('nomeProduto') ? 'is-invalid' : ''}}" name="nomeProduto" id="nomeProduto">
                    @if ($errors->has('nomeProduto'))
                        {{$errors->first('nomeProduto')}}
                    @endif
                </div>
                <div class="top">
                    <label for="precoProduto">Preco do Produto</label>
                    <input type="text" class="form-control  {{$errors->has('precoProduto') ? 'is-invalid' : ''}}" name="precoProduto" id="precoProduto">
                    @if ($errors->has('precoProduto'))
                        {{$errors->first('precoProduto')}}
                    @endif
                </div>
                <div class="top">
                    <label for="nomeCategoria">Categoria do Produto</label>
                    <div>
                        <select class="custom-select nomeCategoria  {{$errors->has('precoProduto') ? 'is-invalid' : ''}} " name="nomeCategoria" id="nomeCategoria">
                            @foreach ($categoria as $c)
                            <option value="{{$c['id']}}">{{$c['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('nomeCategoria'))
                        {{$errors->first('nomeCategoria')}}
                    @endif
                </div>
                <div class="bts">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="submit" class="btn btn-danger btn-sm"><a href="{{route('index')}}">Cancelar</a></button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection