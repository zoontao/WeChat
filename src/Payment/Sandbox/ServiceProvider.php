<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Payment\Sandbox;

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
     * @param \Pimple\Container $app
     */
    public function register(Container $app)
    {
        $app['sandbox'] = function ($app) {
            return new Client($app);
        };
    }
}
