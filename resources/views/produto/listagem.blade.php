    @extends('layout.principal')

    @section('conteudo')

    @if(old('nome'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            O Produto <strong>{{old('nome')}}</strong> foi adicionado com sucesso!
        </div>
    @endif

    @if(empty($produtos))
        <div class="alert alert-danger">
            Voê não tem produtos cadastrado.
        </div>
    @else
        <h1>Listagem de Produtos</h1>
        <table class="table table-bordered table-striped table-hover">
            @foreach($produtos as $produto)
                <tr class="{{($produto->quantidade <= 1) ? 'danger' : ''}}">
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->valor}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>{{$produto->quantidade}}</td>
                    <td class="text-center">
                        <a href="/produtos/mostra/{{$produto->id}}">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="{{action('ProdutoController@remove', $produto->id)}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

        <h4>
            <span class="label label-danger pull-right">
                Um ou menos itens no estoque
            </span>
        </h4>
    @endif

    @stop