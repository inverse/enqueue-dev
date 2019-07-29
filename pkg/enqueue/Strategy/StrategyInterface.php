<?php

namespace Enqueue\Strategy;

use Enqueue\Dsn\Dsn;

interface StrategyInterface
{
    public function select(array $dsns): Dsn;
}
