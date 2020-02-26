<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\UniformMessage;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['uniform_message'] = function ($app) {
            return new Client($app);
        };
    }
}
