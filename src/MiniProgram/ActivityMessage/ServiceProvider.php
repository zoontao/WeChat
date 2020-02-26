<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\ActivityMessage;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['activity_message'] = function ($app) {
            return new Client($app);
        };
    }
}
