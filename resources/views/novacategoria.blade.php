@extends('layout.app', ["current" => "categorias"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="{{route('categorias.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeCategoria">Nome da Categoria</label>
                <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria" placeholder="Categoria">
                <div class="bts">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection