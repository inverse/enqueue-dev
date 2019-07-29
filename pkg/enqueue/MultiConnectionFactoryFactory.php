<?php

namespace Enqueue;

use Enqueue\Dsn\Dsn;
use Enqueue\Strategy\StrategyInterface;
use Interop\Queue\ConnectionFactory;

final class MultiConnectionFactoryFactory extends BaseConnectionFactoryFactory implements ConnectionFactoryFactoryInterface
{
    /**
     * @var StrategyInterface
     */
    private $strategy;

    public function create($config): ConnectionFactory
    {
        $this->validate($config);

        $dsns = Dsn::parse($config['dsn']);

        if (!empty($dsns)) {
            throw new \InvalidArgumentException('Config contained no valid DSN');
        }

        $dsn = $this->strategy->select($dsns);

        return $this->create($dsn, $config);
    }
}
