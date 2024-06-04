<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }
    public function listar(Request $request){
        $fornecedores = Fornecedor::where('nome','like','%'.$request->input('nome').'%')
        ->where('site','like','%'.$request->input('site').'%')
        ->where('uf','like','%'.$request->input('uf').'%')
        ->where('email','like','%'.$request->input('email').'%')
        ->paginate(15);
        

       
        return view('app.fornecedor.listar',['fornecedores'=>$fornecedores, 'request'=>$request->all()]);
    }
    public function adicionar(Request $request){

        if($request->input('_token') != '' && $request->input('id') ==''  ){
            $regras=[
                'nome' => 'required|min:2|max:50',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'required' =>'O campo :attribute deve ser preenchido',
                'nome.min' =>'O campo nome deve ter no minimo 2 caracteres',
                'nome.max' =>'O campo nome deve ter no maximo 50 caracteres',
                'uf.min' =>'O campo UF deve ter no minimo 2 caracteres',
                'uf.max' =>'O campo UF deve ter no maximo 2 caracteres',
                'email' =>'O campo email deve ser preenchido com um email valido',
            ];
            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
        }
        if($request->input('_token') != '' && $request->input('id') !=''  ){
           
            $fornecedor = Fornecedor::find($request->input('id'));            
            $fornecedor->update($request->all());
        }

       


        return view('app.fornecedor.adicionar');
    }
    public function editar($id){
            $fornecedor = Fornecedor::find($id);
            return view('app.fornecedor.adicionar',['fornecedor'=>$fornecedor]);

    }
    public function excluir($id){
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor');
        
    }
}
