<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{

    public function __construct(){
        $this->middleware(LogAcessoMiddleware::Class);
    }// chamado middleware direto no controller


    public function sobreNos() {
        return view('site.sobre-nos');
    }
}
