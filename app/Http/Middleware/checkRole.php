<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkRole
{
    public function handle($request, Closure $next){
        if(Auth::user()->rol->id != 1){
            return redirect("/");
        }
        return $next($request);
    }
}
