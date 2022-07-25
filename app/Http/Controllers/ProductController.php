<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        /* Lista e retorna todos os produtos */
        $produtos = Product::all();
        $categorias = Category::all();

        return view('Produtos.lista', ['produtos'=>$produtos, 'categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();

        return view('Produtos.cadastrar', ['categorias'=> $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validação dos campos */
        $request->validate([
            'nome'      => 'required',
            'preco'     => 'required',
            'categoria' => 'required'
        ]); 

        /* Criação do novo produto */
        $produto = new Product;
        $produto->fill($request->all());

        if($produto->save()){
            return redirect('/produtos')->with('mensagemSucesso', 'Produto cadastrado com sucesso!');
        }
        else{
            return redirect('/produtos')->with('mensagemErro', 'Não foi possível cadastrar o produto!');
        }                     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* Busca do produto requisitado através do ID  */
        $produto = Product::find($id);
        $categorias = Category::all();

        return view('Produtos.editar', ['produto'=>$produto, 'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        /* Validação dos campos */
        $request->validate([
            'nome'      => 'required',
            'preco'     => 'required',
            'categoria' => 'required'
        ]); 

        /* Busca do produto solicitado através do id, para a alteração dos campos */
        $produto=Product::find($id);        
        $produto->nome = $request->input('nome', $produto->nome);
        $produto->preco = $request->input('preco', $produto->preco);
        $produto->categoria = $request->input('categoria', $produto->categoria);
  
        if($produto->save()){
            return redirect('/produtos')->with('mensagemSucesso', 'Produto alterado com sucesso!');
        }
        else{
            return redirect('/produtos')->with('mensagemErro', 'Não foi possível alterar o produto!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        /* Busca o produto de acordo com o id */
        $produto = Product::find($id);
        
        if($produto->delete()){
            return redirect('/produtos')->with('mensagemSucesso', 'Produto deletado com sucesso!');
        }
        else{
            return redirect('/produtos')->with('mensagemErro', 'Não foi possível deletar o produto!');
        }
    }
}
