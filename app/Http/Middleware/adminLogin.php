<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;

class adminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if((Session::has('user') && (Session::get('user')['type'] === 'admin')) && ($request->path()==='adminLogin' || $request->path()==='adminSignup')){
            return back();
        }
        return $next($request);
    }
}
