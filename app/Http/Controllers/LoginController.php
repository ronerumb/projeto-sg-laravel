<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{



    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuario ou senha não existe';
        }


        return view('site.login', ['erro' =>$erro]);
    }

     
    public function autenticar(Request $request){
        $regras = [
            'usuario'=>'email',
            'senha'=>'required'
        ];

        $feedback = [
            'usuario.email'=>'O campo usuario(e-mail) é obrigatório',
            'senha.required'=>'O campo senha é obrigatório'
        ];
        $request->validate($regras,$feedback);

        $email = $request->get('usuario');
        $senha = $request->get('senha');


        $user = new User();

        $usuario = $user->where('email', $email)->where('password',$senha)->get()->first();

        if(isset($usuario->name)){
          session_start();
          $_SESSION['nome'] = $usuario->name;
          $_SESSION['email'] = $usuario->email;

          return redirect()->route('app.cliente');
        }else{
            return redirect()->route('site.login', ['erro'=>1]);
        }

        

    }
    public function sair(){
       session_destroy();
       return redirect()->route('site.index');
    }
}
