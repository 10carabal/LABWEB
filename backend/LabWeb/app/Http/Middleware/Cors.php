<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
    $response = $next($request);
    $response->header('Access-Control-Allow-Origin', "*");
    $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-XSRF-TOKEN, Access-Control-Allow-Origin, Accept, Referer');
    $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE');
    return $response;
  }
}
