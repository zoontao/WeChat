<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\OpenData;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['open_data'] = function ($app) {
            return new Client($app);
        };
    }
}
