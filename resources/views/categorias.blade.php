@extends('layout.app', ["current" => "categorias"])

@section('body')
@if (count($categoria)>0)
<div class="card border">
    <div class="card-body"> 
        <h5 class="card-title">Listagem de Categorias</h5>
            <div class="tam">
                <table class="table table-ordered table-hover"> 
                    <head>
                        <tr>
                            <th>Código</th>
                            <th>Nome da Categoria</th>
                            <th>Ações</th>
                        </tr>
                        <div class="roll">
                            <tbody>
                                @foreach ($categoria as $c)
                                    <tr>
                                        <td>{{$c['id']}}</td>
                                        <td>{{$c['name']}}</td>
                                        <td>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="row align-items-start">
                                                        <div class="col">
                                                            <a href="{{ route('categorias.edit', $c['id']) }}" class="btn btn-sm btn-primary">Editar</a>
                                                        </div>
                                                        <div class="col">
                                                            <form action="{{ route('categorias.destroy', $c['id']) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="submit" class="btn btn-sm btn-danger" value="Apagar">
                                                            </form>
                                                        </div>
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </div>    
                    </head>
                </table>                    
            </div>        
    </div>
    <div class="card-footer">
        <a href="{{route('categorias.create')}}" class="btn btn-sm btn-primary" role="button">Nova Categoria</a>
    </div>
    @else
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="pos">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Categorias</h5>
                        <p class="card=text">
                            Aqui voce cadastra todos as suas Categorias.
                        </p>
                        <a href="{{ route('categorias.create')}}" class="btn btn-primary">Cadastre Suas Categorias</a>
                    </div>
                </div>
            </div>       
            </div> 
        </div>  
    @endif
    </div>
@endsection