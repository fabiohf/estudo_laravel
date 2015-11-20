<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {return 'Estudo Laravel';});
Route::get('produtos', 'ProdutoController@lista');
Route::get('produtos/mostra/{id}', 'ProdutoController@mostra');
Route::get('produtos/novo', 'ProdutoController@novo');
Route::get('produtos/remove/{id}', 'ProdutoController@remove');
Route::get('produtos/json', 'ProdutoController@retornarJsonProdutos');

Route::post('produtos/adiciona', 'ProdutoController@adiciona');
