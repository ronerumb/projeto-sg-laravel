<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        $contato = new SiteContato(); 
        /*       
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        return view('site.contato');

        $contato->fill($request->all());
        $contato->save();
        
*/
    $motivo_contatos = MotivoContato::all();
        return view('site.contato',  ['motivo_contatos' => $motivo_contatos]);

    }
    public function salvar(Request $request){
        $request->validate([
            'nome'=>'required',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required'
        ],
    [
        'email.email' =>'O campo email precisa ser preenchido com um email valido',
        'required'=>'O campo precisa ser preenchido'
        
    ]);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
