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
    public function index()
    {
        $produto = Produto::all();
        $categoria = Categoria::all();
        return view('produtos', compact(['produto']));
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
        $produto = new Produto;
        $produto->name = $request->input('nomeProduto');
        $produto->preco = $request->input('precoProduto');
        $produto->categoria_id = $request->input('nomeCategoria');
        if(isset($produto['name'])){
        $produto->save();
        return redirect()->route('produtos.index');
        } else {
            return view('novoproduto');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->id = $id;
        $categoria = Categoria::all();
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
        $this->id = $id;
        $produto = Produto::find($id);
        $produto->name = $request->input('nomeProduto');
        $produto->preco = $request->input('precoProduto');
        $produto->categoria_id = $request->input('categoriaProduto');
        if(isset($produto['name'])){
            $produto->save();
            return redirect()->route('produtos.index');
        } else {
            return view('editarproduto');
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
        $this->id = $id;
        $del = Produto::find($id);
        if(isset($del)){
            $del->delete();
        } 
        return redirect()->route('produtos.index');
    }
}
