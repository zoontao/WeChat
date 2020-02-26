<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork\SuiteAuth;

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
        $app['suite_ticket'] = function ($app) {
            return new SuiteTicket($app);
        };

        isset($app['suite_access_token']) || $app['suite_access_token'] = function ($app) {
            return new AccessToken($app);
        };
    }
}
