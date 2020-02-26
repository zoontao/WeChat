<?php

/*
 * This file is part of the overtrue/wechat.

 */

/**
 * ServiceProvider.php.
 *
 * This file is part of the wechat.

 */

namespace WeChat\BasicService\Media;

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
        $app['media'] = function ($app) {
            return new Client($app);
        };
    }
}
