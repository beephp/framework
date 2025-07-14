<?php

namespace Beephp\Framework\Contracts;

use Beephp\Framework\Http\Request;
use Beephp\Framework\Http\Response;

interface KernelInterface
{
    public function handle(Request $request): Response;
}
