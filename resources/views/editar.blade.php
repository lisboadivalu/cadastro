@extends('layout.app', ["current" => "Editar Categoria"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="{{ route('categorias.update', $categoria['id']) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nomeCategoria">Nome da Categoria</label>
                <input type="hidden" placeholder="{{$categoria['id']}}">
                <input type="text" class="form-control" name="nomeCategoria" placeholder="{{$categoria['name']}}">
                <div class="bts">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </div>    
            </div>
        </form>
    </div>
</div>


@endsection