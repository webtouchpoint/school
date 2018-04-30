<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Settings\SchoolSession;

class AddCurrentSchoolSessionIdToRequest
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
        $current_school_session_id = SchoolSession::where('is_current', true)->value('id');

        $request->merge(['current_school_session_id' => $current_school_session_id]);
        
        return $next($request);
    }
}
