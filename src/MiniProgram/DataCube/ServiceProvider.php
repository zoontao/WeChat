<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\DataCube;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['data_cube'] = function ($app) {
            return new Client($app);
        };
    }
}
