<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Busca e retorna todas as categorias */
        $categoria = Category::all();
        return view('Categorias.lista', ['categorias' => $categoria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categorias.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]); 

        /* Criação da nova categoria */
        $categoria = new Category;
        $categoria->fill($request->all());

        if($categoria->save()){
            return  redirect('/categorias')->with('mensagemSucesso', 'Categoria cadastrada com sucesso!');    
        }
        else{
            return  redirect('/categorias')->with('mensagemErro', 'Não foi possível cadastrar a categoria!');    
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
        /* Busca os dados da categoria requisitada */
        $categoria = Category::find($id);

        return view('Categorias.editar', ['categoria'=>$categoria]);
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
        $request->validate([
            'nome' => 'required',
        ]); 
        
        /* Busca a categoria solicitada para o update através do ID */
        $categoria=Category::find($id);        
        $categoria->nome = $request->input('nome', $categoria->nome);
  
        if($categoria->save()){
            return redirect('/categorias')->with('mensagemSucesso', 'Categoria alterada com sucesso!');
        }
        else{
            return  redirect('/categorias')->with('mensagemErro', 'Não foi possível alterar a categoria!');    
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
        /* Busca a categoria através do ID */
        $categoria = Category::find($id);
        $produtos = Product::where('categoria', '=', $id)->get();

        /* Antes de deletar, verifica se a categoria possui algum produto atrelado a ela */
        if(sizeof($produtos)==0){
            $categoria->delete();
            return redirect('categorias')->with('mensagemSucesso', 'Categoria deletada com sucesso!');
        }
        else{
            return redirect('/categorias')->with('mensagemErro', 'Não foi possível deletar a categoria. Existem produtos vinculados a ela.');
        }
    }
}
