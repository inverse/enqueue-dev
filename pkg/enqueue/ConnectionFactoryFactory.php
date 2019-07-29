<?php

namespace Enqueue;

use Enqueue\Dsn\Dsn;
use Interop\Queue\ConnectionFactory;

final class ConnectionFactoryFactory extends BaseConnectionFactoryFactory implements ConnectionFactoryFactoryInterface
{
    public function create($config): ConnectionFactory
    {
        $this->validate($config);

        $dsn = Dsn::parseFirst($config['dsn']);

        return $this->create($dsn, $config);
    }
}
