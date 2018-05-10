<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Admin {
	public function handle($request, Closure $next){
		if (Session::get('admin'))
			return $next($request);
		return redirect('/');
	}
}