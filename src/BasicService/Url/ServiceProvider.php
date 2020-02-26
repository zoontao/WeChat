<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\BasicService\Url;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['url'] = function ($app) {
            return new Client($app);
        };
    }
}
