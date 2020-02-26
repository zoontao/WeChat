<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\Plugin;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param \Pimple\Container $app
     */
    public function register(Container $app)
    {
        $app['plugin'] = function ($app) {
            return new Client($app);
        };

        $app['plugin_dev'] = function ($app) {
            return new DevClient($app);
        };
    }
}
