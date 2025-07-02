<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Waiter
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
        $userRole = Auth::guard('admin')->user()->role;

        $restrictedRoles = [4, 5];

        if (in_array($userRole, $restrictedRoles)) {
            return redirect()->back()->with('error', 'You do not have permission access this page. Thank you!');
        }
        return $next($request);
    }
}
