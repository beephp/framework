<?php

namespace Beephp\Framework\Core;

class Container
{
    protected array $bindings = [];

    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function make(string $key)
    {
        if (!isset($this->bindings[$key])) {
            throw new \RuntimeException("Nothing bound to key: $key");
        }

        return $this->bindings[$key]();
    }
}
