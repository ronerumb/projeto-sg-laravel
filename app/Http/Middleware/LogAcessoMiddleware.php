<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->server->get('REMOTE_ADDR');//ip
        $rota = $request->getRequestUri();//rota
        LogAcesso::create(['log' =>"IP $ip solicitou a rota $rota"]);
        return $next($request);
    }
}
