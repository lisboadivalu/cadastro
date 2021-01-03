<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class ControladorCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::all();
        return view('categorias', compact(['categoria']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novacategoria');
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
            "nomeCategoria" => "required"
        ];

        $mensagem = [
            'required' => 'O campo :attribute precisa ser preenchido.' 
        ];

        $request->validate($regras, $mensagem);

        $categoria = new Categoria;
        $categoria->name = $request->input('nomeCategoria');
        $categoria->save();
        return redirect()->route('categorias.index');
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
        $categoria = Categoria::find($id);
        return view('editar', compact(['categoria']));
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
        $regras = [
            "nomeCategoria" => "required"
        ];
        $mensagem = [
            'required' => 'O campo :attribute precisa ser preenchido.' 
        ];
        $request->validate($regras, $mensagem);

        $this->id = $id;
        $categoria = Categoria::find($id);
        $categoria->name = $request->input('nomeCategoria');
        $categoria->save();
        return redirect()->route('categorias.index');
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
        $del = Categoria::find($id);
        if(isset($del)){
            $del->delete();
        }
        return redirect()->route('categorias.index');
    }
}
