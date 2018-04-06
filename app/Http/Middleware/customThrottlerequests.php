<?php

namespace App\Http\Middleware;

use App\traits\ApiResponser;
use Closure;
use Illuminate\Routing\Middleware\ThrottleRequests;

class customThrottlerequests extends ThrottleRequests
{
    use ApiResponser;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected function buildResponse($key,$maxAttempts)
    {
        $response = $this->errorResponse('To Many Attempts',  429);
        $reTryAfter = $this->limiter->availablein($key,$maxAttempts,$reTryAfter);
        
        return $this->addHeaders(
            $response,$maxAttempts,
            $this->calculateRemaingAttempts($key,$maxAttempts,$reTryAfter),
            $reTryAfter
        );
    }
}
