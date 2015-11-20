<?php

namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class ProdutoController extends Controller
{
    public function lista()
    {
        $produtos = DB::select('select * from produtos');
        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function mostra()
    {
        $id = Request::route('id');
        $produto = DB::select('select * from produtos where id = ?', [$id]);
        if (empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('produto', $produto[0]);
    }

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona()
    {
        $produto = Request::all();
        DB::insert('insert into produtos values (null, ?, ?, ?, ?)',
           array(
                $produto['nome'],
                $produto['valor'],
                $produto['descricao'],
                $produto['quantidade']
            )
        );
        return redirect('/produtos')->withInput(Request::only('nome'));
    }

    public function retornarJsonProdutos()
    {
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }

}
