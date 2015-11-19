    @extends('layout.principal')

    @section('conteudo')

        <h1>Novo Produto</h1>

        <form action="/produtos/adiciona" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input name="nome" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <input name="descricao" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Valor</label>
                <input name="valor" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Quantidade</label>
                <input name="quantidade" class="form-control" type="number"/>
            </div>

            <input name="_token" type="hidden" value="{{{csrf_token()}}}"/>

            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
        </form>
    @stop