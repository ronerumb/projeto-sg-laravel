<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
use App\Item;
use App\Fornecedor;
use App\ProdutoDetalhe;
use Illuminate\Http\Request;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe','fornecedor'])->paginate(15);

      
        
       return view('app.produto.index',['produtos'=>$produtos , 'request'=>$request->all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' =>$unidades, 'fornecedores'=>$fornecedores]);
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
            'nome'=>'required|min:3|max:40',
            'descricao'=>'required|min:3|max:4000',
            'peso'=>'required|integer',
            'unidade_id'=>'exists:unidades,id',
            'fornecedor_id'=>'exists:fornecedors,id'
            
        ];
        $feedback = [
            'required'=>'O campo :attribute deve ser preenchido',
            'min'=> 'O campo :attribute deve ter no minimo 3 caracteres',
            'nome.max'=> 'O campo :attribute deve ter no maximo 40 caracteres',
            'descricao.max'=> 'O campo :attribute deve ter no maximo 4000 caracteres',
            'integer'=>'O campo :attribute deve ser do tipo inteiro',
            'unidade_id.exists'=> 'A unidade de medida informada não existe',
            'fornecedor_id.exists'=> 'O fornecedor não existe'
        ];

        $request->validate($regras,$feedback);

        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show',['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit',['produto'=>$produto, 'unidades'=> $unidades,'fornecedores'=>$fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome'=>'required|min:3|max:40',
            'descricao'=>'required|min:3|max:4000',
            'peso'=>'required|integer',
            'unidade_id'=>'exists:unidades,id',
            'fornecedor_id'=>'exists:fornecedors,id'
            
        ];
        $feedback = [
            'required'=>'O campo :attribute deve ser preenchido',
            'min'=> 'O campo :attribute deve ter no minimo 3 caracteres',
            'nome.max'=> 'O campo :attribute deve ter no maximo 40 caracteres',
            'descricao.max'=> 'O campo :attribute deve ter no maximo 4000 caracteres',
            'integer'=>'O campo :attribute deve ser do tipo inteiro',
            'unidade_id.exists'=> 'A unidade de medida informada não existe',
            'fornecedor_id.exists'=> 'O fornecedor não existe'
        ];

        $request->validate($regras,$feedback);
      
        $produto->update($request->all());
        return redirect()->route('produto.show',['produto'=> $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
