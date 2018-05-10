<?php 
namespace App\Http\Middleware;

use Closure;

class CheckDay {
	public function handle($request, Closure $next){
		if(date('N') != 6) 
			return $next($request);
		return response("Peringatan!!!<br>
                    Maaf, website sedang dalam perawatan.");
	}
}