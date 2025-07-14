<?php

namespace Beephp\Framework\Http;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class Response
{
    protected SymfonyResponse $response;

    public function __construct(string $content = '', int $status = 200, array $headers = [])
    {
        $this->response = new SymfonyResponse($content, $status, $headers);
    }

    public function setContent(string $content): self
    {
        $this->response->setContent($content);
        return $this;
    }

    public function setStatus(int $status): self
    {
        $this->response->setStatusCode($status);
        return $this;
    }

    public function setHeader(string $key, string $value): self
    {
        $this->response->headers->set($key, $value);
        return $this;
    }

    public function send(): void
    {
        $this->response->send();
    }

    public function getOriginal(): SymfonyResponse
    {
        return $this->response;
    }
}
