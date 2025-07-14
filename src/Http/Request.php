<?php

namespace Beephp\Framework\Http;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request
{
    protected SymfonyRequest $request;

    public function __construct(SymfonyRequest $request)
    {
        $this->request = $request;
    }

    public static function capture(): self
    {
        return new self(SymfonyRequest::createFromGlobals());
    }

    public function method(): string
    {
        return $this->request->getMethod();
    }

    public function path(): string
    {
        return $this->request->getPathInfo();
    }

    public function input(string $key, $default = null): mixed
    {
        return $this->request->get($key, $default);
    }

    public function all(): array
    {
        return $this->request->request->all();
    }

    public function headers(): array
    {
        return $this->request->headers->all();
    }

    public function getOriginal(): SymfonyRequest
    {
        return $this->request;
    }
}
