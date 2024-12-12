<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // تحقق من تسجيل دخول المستخدم
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // تحقق من العمر
        $age = Auth::user()->age;
        if ($age < 15) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
