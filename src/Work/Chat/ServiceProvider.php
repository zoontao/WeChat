<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\Chat;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 *
 * @author XiaolonY <xiaolony@hotmail.com>
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['chat'] = function ($app) {
            return new Client($app);
        };
    }
}
