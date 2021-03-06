<?php

namespace App\Http\Middleware;

use Closure;

class DiretorExecutivo
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
      if (Auth::check() && Auth::user()->tipos_usuarios_id == 1) {
        return $next($request);
      }
      else {
        return redirect('/index');
      }
    }
}
