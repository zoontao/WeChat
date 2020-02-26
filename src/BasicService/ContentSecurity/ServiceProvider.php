<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\BasicService\ContentSecurity;

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
        $app['content_security'] = function ($app) {
            return new Client($app);
        };
    }
}
