<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Employe
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{
		$user = Auth::user();
		if ($user && $user->getAuthType() == 'employe') {
			return $next($request);
		}
		return redirect()->route('dashboard');
	}
}
