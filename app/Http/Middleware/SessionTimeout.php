<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SessionTimeout
{
    public function handle(Request $request, Closure $next): Response
    {
      $timeout = 30;

    if (Auth::check()) {

        $lastActivity = session('last_activity');

        if (
            $lastActivity &&
            (time() - $lastActivity > $timeout)
        ) {

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->with(
                    'timeout',
                    'Session habis karena tidak aktif selama 30 detik.'
                );
        }

        session([
            'last_activity' => time()
        ]);
    }

    return $next($request);
}
}