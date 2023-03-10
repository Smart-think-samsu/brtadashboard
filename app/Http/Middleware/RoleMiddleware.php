<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth; 
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {  
        //dd($user->hasRole('admin','editor'));
        //dd($role);        
        //dd($request->user()->hasRole($role));

        if(!$request->user()->hasRole($role)) {
             abort(404);
        }
        //dd($role);
        if($permission !== null && !$request->user()->can($permission)) {
              abort(404);
        }
        //dd($role);
        return $next($request);
    }
}
