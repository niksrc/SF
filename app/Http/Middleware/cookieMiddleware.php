<?php namespace shyfirst\Http\Middleware;
use Illuminate\Http\RedirectResponse;
use Closure;

class cookieMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		
		if(!$request->cookie('shy_first_id') && !$request->cookie('shy_first_sex') ){
			return new RedirectResponse(url('/'));
			
        
		}



		return $next($request);
	}

}
