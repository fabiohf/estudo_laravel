    @extends('layout.principal')

    @section('conteudo')

    @if (count($errors) > 0)
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Novo Produto</h1>

    <form action="/produtos/adiciona" method="post">
        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{old("nome")}}"/>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input name="descricao" class="form-control" value="{{old("descricao")}}">
        </div>

        <div class="form-group">
            <label>Valor</label>
            <input name="valor" class="form-control" value="{{old("valor")}}"/>
        </div>

        <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" class="form-control" type="number" value="{{old("quantidade")}}"/>
        </div>

        <div class="form-group">
            <label>Tamanho</label>
            <input name="tamanho" class="form-control" value="{{old("tamanho")}}"/>
        </div>

        <input name="_token" type="hidden" value="{{{csrf_token()}}}"/>

        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
    </form>

    @stop