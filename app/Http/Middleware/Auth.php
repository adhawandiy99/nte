<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Closure;

class Auth
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
        if (!Session::has('auth')) {   
            if ($request->ajax()) {
                return response('UNAUTHORIZED', 401);
            } else {
                return redirect('login');
            }
        }
        return $next($request);
        
    }
}
