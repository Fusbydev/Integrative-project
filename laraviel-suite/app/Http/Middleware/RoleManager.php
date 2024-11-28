<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(!Auth::check ()){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $authUserRole = Auth::user()->role;

        switch($role) {
            case 'admin':
                if($authUserRole == 'admin') {
                    return $next($request);
                }
                break;
            case 'cashier':
                if($authUserRole == 'cashier') {
                    return $next($request);
                }
                break;
        }

        switch($authUserRole) {
            case 'admin':
                return redirect()->route('admin');
            case 'cashier':
                return redirect()->route('cashier');
        }

        return redirect()->route('auth.login');
    }
}
