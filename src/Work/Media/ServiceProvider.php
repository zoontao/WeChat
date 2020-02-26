<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\Media;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['media'] = function ($app) {
            return new Client($app);
        };
    }
}
