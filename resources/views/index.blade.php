@extends('layout.app', ["current" => "Home"])

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
                <div class="card-deck">
                    <div class="card border border-primary">    
                        <div class="card-body">
                            <h5 class="card-title">Cadastro de Produtos</h5>
                            <p class="card=text">
                                Aqui voce cadastra todos os seus Produtos.
                            </p>
                            <a href="{{ Route('produtos.create') }}" class="btn btn-primary">Cadastre Seus Produtos</a>
                        </div>
                    </div>   
                    <div class="card border border-primary">    
                        <div class="card-body">
                            <h5 class="card-title">Cadastro de Categorias</h5>
                            <p class="card=text">
                                Aqui voce cadastra todos as suas Categorias.
                            </p>
                            <a href="{{ Route('categorias.create') }}" class="btn btn-primary">Cadastre Suas Categorias</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection