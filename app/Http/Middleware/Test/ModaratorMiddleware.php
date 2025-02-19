<?php

namespace App\Http\Middleware\Test;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModaratorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::with('user_role')->find(2);
        // dd($user->toArray());
        if ($user['user_role']['id'] == 3) {
            if (request()->route()->uri == '/test/create' || request()->route()->uri == '/test/edit') {
                return $next($request);
            }else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
}
