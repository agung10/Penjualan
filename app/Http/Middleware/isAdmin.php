<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Support\Facades\Auth as Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $level)
    {
        $user = Auth::user();
        if  ($user && $user->level !=$level) {
            return App::abort(Auth::check() ? 403 : 401, Auth::check() ? 'Forbidden' : 'Unauthorized');
        }
        return $next($request);
    }
}
