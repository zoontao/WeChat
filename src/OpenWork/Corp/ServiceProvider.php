<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork\Corp;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * ServiceProvider.
 *
 * @author xiaomin <keacefull@gmail.com>
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
        isset($app['corp']) || $app['corp'] = function ($app) {
            return new Client($app);
        };
    }
}
