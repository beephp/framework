<?php

namespace Beephp\Framework\Core;

use Beephp\Framework\Http\Request;
use Beephp\Framework\Http\Response;

class Kernel
{
    protected Application $app;
    protected array $middleware = [];

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->registerMiddleware();
    }

    public function handle(Request $request): Response
    {
        $handler = fn() => new Response("BeePHP Response from Kernel");

        foreach (array_reverse($this->middleware) as $middleware) {
            $next = $handler;
            $handler = fn() => (new $middleware())->handle($request, $next);
        }

        return $handler();
    }

    protected function registerMiddleware(): void
    {
        $this->middleware = [
            \Beephp\Framework\Middleware\ExampleMiddleware::class,
        ];
    }
}
