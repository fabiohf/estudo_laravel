<?php

namespace estoque\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Validator;

use estoque\Produto;
use estoque\Categoria;
use estoque\Http\Requests\ProdutoRequest;


class ProdutoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only'=>['adiciona', 'remove']]);
        //$this->middleware('nosso-middleware', ['only'=>['adiciona', 'remove']]);
    }

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
        return view('produto.formulario')->with('categorias', Categoria::all());
    }

    public function adiciona(ProdutoRequest $request)
    {
        /*
        // Validando dados de entrada
        $validator = Validator::make(
            [
                'nome' => Request::input('nome'),
                'descricao' => Request::input('descricao'),
                'valor' => Request::input('valor'),
                'quantidade' => Request::input('quantidade')
            ],
            [
                'nome' => 'required|min:5',
                'descricao' => 'required|max:255',
                'valor' => 'required|numeric',
                'quantidade' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->messages();
            dd($messages);

            return redirect()->action('ProdutoController@novo');
        }
       
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
        //Produto::create(Request::all());

        // Agora estou usando o meu produto request
        Produto::create($request->all());

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
