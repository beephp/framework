<?php

namespace Beephp\Framework\Core;

use Beephp\Framework\Core\Container;
use Beephp\Framework\Http\Request;
use Beephp\Framework\Logger\Logger;
use Beephp\Framework\Contracts\KernelInterface;

class Application
{
    protected Container $container;
    protected KernelInterface $kernel;

    public function __construct()
    {
        $this->container = new Container();
        $this->registerBaseBindings();
    }

    public function setKernel(KernelInterface $kernel): void
    {
        $this->kernel = $kernel;
    }

    public function run(): void
    {
        $request = Request::capture();
        $response = $this->kernel->handle($request);
        $response->send();
    }

    protected function registerBaseBindings(): void
    {
        $this->container->bind('request', fn() => Request::capture());
        $this->container->bind('logger', fn() => new Logger());
    }

    public function getContainer(): Container
    {
        return $this->container;
    }
}
