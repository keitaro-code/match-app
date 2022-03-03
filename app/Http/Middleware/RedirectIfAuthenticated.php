<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // if (Auth::guard($guard)->check()) {
            //     if($guard == 'companies')
            //     return redirect(RouteServiceProvider::COMPANIES_HOME);
            //     return redirect(RouteServiceProvider::HOME);
            // }

            // どちらかにログインしている場合はログアウトするまで別のログイン画面を表示させないために
            if (Auth::guard()->check()) return redirect(RouteServiceProvider::HOME);
            if (Auth::guard('companies')->check()) return redirect(RouteServiceProvider::COMPANIES_HOME);
        }

        return $next($request);
    }
}
