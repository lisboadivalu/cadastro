<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;


class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function indexView()
    {
        return view('produtos');
    }

    public function index()
    {
        $produtos = Produto::all();
        return $produtos->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::all();
        return view('novoproduto', compact(['categoria']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nomeProduto' => 'required',
            'precoProduto' => 'required',
            'nomeCategoria' => 'required'
        ];
        $mensagem = [
            'required' => 'O campo :attribute precisa ser preenchido.'
        ];
        $request->validate($regras, $mensagem);

        $produto = new Produto();
        $produto->name = $request->input('nomeProduto');
        $produto->preco = $request->input('precoProduto');
        $produto->categoria_id = $request->input('nomeCategoria');
        $produto->save();
        return json_encode($produto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        if(isset($produto)){
            return json_encode($produto);
        } 
            return response('Produto nao encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::all();
        $this->id = $id;
        $produto = Produto::find($id);
        return view('editarproduto', compact(['produto','categoria']));
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
        dd($request->all());
        $regras = [
            'nomeProduto' => 'required',
            'precoProduto' => 'required',
            'nomeCategoria' => 'required'
        ];
        $mensagem = [
            'required' => 'O campo :attribute precisa ser preenchido.'
        ];
        $request->validate($regras, $mensagem);

        $produto = Produto::find($id);
        if(isset($produto)){
            $produto->name = $request->input('nomeProduto');
            $produto->preco = $request->input('precoProduto');
            $produto->categoria_id = $request->input('nomeCategoria');
            $produto->save();
            return json_encode($produto);
        } 
            return response('Produto nao encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Produto::find($id);
        if(isset($del)){
            $del->delete();
            return response('OK', 200);
        } 
        return response('Produto nao encontrado', 404);
    }

    
}
