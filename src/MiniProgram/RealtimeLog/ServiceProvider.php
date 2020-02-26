<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\RealtimeLog;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 *
 * @author her-cat <i@her-cat.com>
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $app)
    {
        $app['realtime_log'] = function ($app) {
            return new Client($app);
        };
    }
}
