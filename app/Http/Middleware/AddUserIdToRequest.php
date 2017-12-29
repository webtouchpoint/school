<?php

namespace App\Http\Middleware;

use Closure;

class AddUserIdToRequest
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
        $request->merge(['user_id' => auth()->id()]);
        
        return $next($request);
    }
}
