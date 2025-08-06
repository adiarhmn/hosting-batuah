<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $argument): Response
    {
        $roleUser = Auth::user()->role->name ?? null;
        if (!$roleUser) {
            return redirect('/login')->with('error', 'You must be logged in to access this section.');
        }
        // dd($roleUser, $argument, Auth::check()); // Debugging line to check the role and argument
        if ($roleUser !== $argument) {
            return redirect("/{$roleUser}/dashboard")->with('error', 'You do not have access to this section.');
        }

        return $next($request);
    }
}
