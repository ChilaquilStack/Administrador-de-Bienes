<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class checkRole
{
    public function handle($request, Closure $next){
        if(Auth::user()->rol->id != 3){
            return redirect("/");
        }
        return $next($request);
    }
}
