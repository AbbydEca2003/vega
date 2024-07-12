<?php

namespace App\Http\Middleware;

use Closure;

class LoginVerification
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
        // return $next($request);
        $id = $request->session()->get('id');
        if($id){
            return $next($request);
        }else{
            return redirect('/login');
        }
         
    }
}
