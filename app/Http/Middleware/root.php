<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class root{

    public function handle($request, Closure $next) {
        if(Auth::user()->rol->id != 1) {
        	return redirect("/creditos")->with("status", "No tiene suficientes privilegios");
        }
        return $next($request);
    }
}
