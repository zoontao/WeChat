<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Payment\Security;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 *
 * @author overtrue <i@overtrue.me>
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['security'] = function ($app) {
            return new Client($app);
        };
    }
}
