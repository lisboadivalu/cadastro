@extends('layout.app', ["current" => "Editar Categoria"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="{{ route('categorias.update', $categoria['id']) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nomeCategoria">Nome da Categoria</label>
                <input type="text" class="form-control {{ $errors->has('nomeCategoria') ? 'is-invalid' : ''}}" name="nomeCategoria" placeholder="{{$categoria['name']}}">
                @if($errors->has('nomeCategoria'))
                    {{$errors->first('nomeCategoria')}}
                @endif
                <div class="bts">
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="submit" class="btn btn-danger btn-sm"><a href="{{route('categorias.index')}}">Cancelar</a></button>
                </div>    
            </div>
        </form>
    </div>
</div>


@endsection