<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleMiddleware
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
        if($request->user() === null) {
        	return redirect('/')->with('message', 'Please log in first, thanks.');
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        if($request->user()->hasOneOfRoles($roles) || !$roles) {
        	return $next($request);
        }
        return redirect('/home')->with('message', 'Insufficient permission');
    }
}
