<?php

namespace Beephp\Framework\Contracts;

use Beephp\Framework\Http\Request;
use Beephp\Framework\Http\Response;

interface MiddlewareInterface
{
    public function handle(Request $request, callable $next): Response;
}
