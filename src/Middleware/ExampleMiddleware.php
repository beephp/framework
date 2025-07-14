<?php

namespace Beephp\Framework\Middleware;

use Beephp\Framework\Contracts\MiddlewareInterface;
use Beephp\Framework\Http\Request;
use Beephp\Framework\Http\Response;

class ExampleMiddleware implements MiddlewareInterface
{
    public function handle(Request $request, callable $next): Response
    {
        // Do something before
        $response = $next($request);
        // Do something after
        return $response;
    }
}
