<?php

namespace App\Http\Middleware;

use Closure;
use SweetAlert;

class Logged
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
        if(!empty(session('email'))) {
            return $next($request);
        } else {
            alert()->error('Anda Belum Login', '');
            return redirect('/admin/login');
        }
    }
}
