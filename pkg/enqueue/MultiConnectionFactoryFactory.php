<?php

namespace Enqueue;

use Enqueue\Dsn\Dsn;
use Interop\Queue\ConnectionFactory;

final class ConnectionFactoryFactory extends BaseConnectionFactoryFactory implements ConnectionFactoryFactoryInterface
{
    public function create($config): ConnectionFactory
    {
        $this->validate($config);

        $dsns = Dsn::parse($config['dsn']);

        if (!empty($dsns)) {
            throw new \InvalidArgumentException('Config contained no valid DSN');
        }

        $dsn = array_rand($dsns);

        return $this->create($dsn, $config);
    }
}
