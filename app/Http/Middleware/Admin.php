<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if((Auth::user()->admin !== 1))
        {
            \Session::flash('info', 'You do not have permission to perform this action');
            return redirect()->back();
        }
        return $next($request);
    }
}
