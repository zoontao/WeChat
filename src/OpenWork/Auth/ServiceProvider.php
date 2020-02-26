<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork\Auth;

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
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        isset($app['provider_access_token']) || $app['provider_access_token'] = function ($app) {
            return new AccessToken($app);
        };
    }
}
