<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * ServiceProvider.
 *
 * @author xiaomin <keacefull@gmail.com>
 */
class ServiceProvider implements ServiceProviderInterface
{
    protected $app;

    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $this->app = $app;
        isset($app['provider']) || $app['provider'] = function ($app) {
            return new Client($app);
        };
    }
}
