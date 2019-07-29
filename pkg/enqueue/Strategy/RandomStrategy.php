<?php

namespace Enqueue\Strategy;

use Enqueue\Dsn\Dsn;

class RandomStrategy implements StrategyInterface
{
    public function select(array $dsns): Dsn
    {
        return array_rand($dsns);
    }
}
