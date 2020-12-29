@extends('layout.app', ["current" => "produtos"])

@section('body')
@if (count($produtos)>0)
<div class="card border">
    <div class="card-body"> 
        <h5 class="card-title">Listagem de Produtos</h5>
            <div class="tam">
                <table class="table table-ordered table-hover"> 
                    <head>
                        <tr>
                            <th>Código</th>
                            <th>Nome do Produto</th>
                            <th>Preço do Produto</th>
                            <th>Categoria do Produto</th>
                            <th>Ações</th>
                        </tr>
                        <div class="roll">
                            <tbody>
                                @foreach ($categoria as $c)
                                    <tr>
                                        <td>{{$c['id']}}</td>
                                        <td>{{$c['name']}}</td>
                                        <td>{{$c['preco']}}</td>
                                        <td>{{$c['categoria']}}</td>
                                        <td>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="row align-items-start">
                                                        <div class="col">
                                                            <a href="{{ route('produtos.edit', $c['id']) }}" class="btn btn-sm btn-primary">Editar</a>
                                                        </div>
                                                        <div class="col">
                                                            <form action="{{ route('produtos.destroy', $c['id']) }}" method="POST">
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
        <a href="{{route('produtos.create')}}" class="btn btn-sm btn-primary" role="button">Novo Produto</a>
    </div>
    @else
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="pos">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Produtos</h5>
                        <p class="card=text">
                            Aqui voce cadastra todos os seus Produtos.
                        </p>
                        <a href="{{ route('produtos.create')}}" class="btn btn-primary">Cadastre Seus Produtos</a>
                    </div>
                </div>
            </div>       
            </div> 
        </div>  
    @endif
    </div>
@endsection