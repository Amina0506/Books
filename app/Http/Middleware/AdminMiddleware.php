<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //is de ingelogde persoon een admin of niet
        if (!Auth::check() || !Auth::user()->is_admin) {
            //als niet =
            return redirect('/');
        }
        return $next($request);
    }
}
