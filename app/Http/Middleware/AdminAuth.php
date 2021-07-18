<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            if ($user->is_admin)
                return $next($request);
        }

        if ($request->ajax())
            return response('Unauthorized.', 401);
        return redirect(Route('admin_login'));
    }
}
