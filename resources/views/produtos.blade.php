@extends('layout.app', ["current" => "Produtos"])

@section('body')
<div class="card border">
    <div class="card-body"> 
        <h5 class="card-title">Listagem de Produtos</h5>
            <div class="tam">
                <table class="table table-ordered table-hover" id="tabelaProdutos"> 
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
                                    
                            </tbody>
                        </div>    
                    </head>
                </table>                    
            </div>        
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" onclick="novoProduto()" role="button">Novo Produto</button>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Produto</h5>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="id" class="form-control">
                        
                        <div class="form-group">
                            <label for="nomeProduto" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precoProduto" class="control-label">Preco do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="precoProduto" placeholder="Preco do Produto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nomeCategoria" class="control-label">Nome da Categoria</label>
                            <div class="input-group">
                                <select class="form-control" id="nomeCategoria">
                                
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="submit" class="btn btn-secondary" data-dissmiss>Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
<script type="text/javascript">
    function novoProduto(){
        $('#id').val('');
        $('#nomeProduto').val('');
        $('#precoProduto').val('');
        $('#nomeCategoria').val('');
        $('#dlgProdutos').modal('show') 
    }
    
    function carregarCategorias() {
        $.getJSON('/api/categorias', function(data){
            for(i=0; i<data.length; i++) {
                opcao = '<option value ="' + data[i].id + '">' + data[i].name + '</option>'; 
                $('#nomeCategoria').append(opcao);
                }
            });
        }

    function montarLinha(p){
        var linha = "<tr>" +
            "<td>" + p.id + "</td>" +
            "<td>" + p.name + "</td>" +
            "<td>" + p.preco + "</td>" +
            "<td>" + p.categoria_id + "</td>" +
            "<td>" +
                '<button class="btn btn-sm btn-primary">Editar</button>' +
                '<button class="btn btn-sm btn-danger">Apagar</button>' +
            "</td>" +
            "</tr>";
            return linha;
    }

    function carregarProdutos() {
        $.getJSON('/api/produtos', function(produtos) {
            for(i=0;i<produtos.length;i++) {
                linha = montarLinha(produtos[i]);
                $('#tabelaProdutos>tbody').append(linha); 
            }
        });
    }

    $(function(){
        carregarCategorias();
        carregarProdutos()
    })
</script>
@endsection