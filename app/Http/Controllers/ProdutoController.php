<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

use estoque\Produto;


class ProdutoController extends Controller
{
    public function lista()
    {
        $produtos = Produto::all();
        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function mostra($id)
    {
        /*
        $id = Request::route('id');
        $produto = DB::select('select * from produtos where id = ?', [$id]);
        */

        $produto = Produto::find($id);
        if(empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('produto', $produto);
    }

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona()
    {
        /*
        $produto = Request::all();
        DB::insert('insert into produtos values (null, ?, ?, ?, ?)',
           array(
                $produto['nome'],
                $produto['valor'],
                $produto['descricao'],
                $produto['quantidade']
            )
        );*/

        /*
        $request = Request::all();
        $produto = new Produto($request);
        $produto->save();
        */

        // Não preciso nem chamar o save
        Produto::create(Request::all());
        return redirect('/produtos')->withInput(Request::only('nome'));
    }

    public function remove($id)
    {
        /*
        $produto = Produto::find($id);
        $produto->delete();
        */
        Produto::destroy($id);

        //return redirect('/produtos')->withInput(Request::only('nome'));
        return redirect()->action('ProdutoController@lista');
    }

    public function retornarJsonProdutos()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

}
