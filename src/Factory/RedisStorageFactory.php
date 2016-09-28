<?php

/**
 * Copyright (c) 2013 Milq Media (https://github.com/milqmedia)
 * For the full copyright and license information, please view
 * the file LICENSE.txt that was distributed with this source code.
 * @author Milq Media <johan@milq.nl>
 */

namespace MQRedisSessionStorage\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use MQRedisSessionStorage\Storage\RedisStorage;

class RedisStorageFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $conf = $container->get('Config');
        $config = null;
        if (isset($conf['mq-redis-session'])) {
            $config = $conf['mq-redis-session'];
        }

        return new RedisStorage($config);
    }
}
