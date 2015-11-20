@extends('layout.principal')

@section('conteudo')

<h1>Detalhes do Produto {{$produto->nome}} </h1>

<ul>
    <li>
        <b>Valor:</b> R$ {{$produto->valor}}
    </li>
    <li>
        <b>Descrição:</b> {{$produto->descricao}}
    </li>
    <li>
        <b>Quantidade:</b> {{$produto->quantidade}}
    </li>
    <li>
        <b>Tamanho:</b> {{$produto->tamanho}}
    </li>
</ul>

@stop
