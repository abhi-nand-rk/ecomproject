<?php

namespace App\Http\Middleware;

use Closure;

class BlockCustomer
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
        if($request->user()->type=='Customer'){
            return redirect('access-restricted');
        }
        return $next($request);
    }
}
