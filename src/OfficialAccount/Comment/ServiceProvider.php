<?php

/*
 * This file is part of the overtrue/wechat.

 */

/**
 * ServiceProvider.php.
 *
 * This file is part of the wechat.

 */

namespace WeChat\OfficialAccount\Comment;

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
        $app['comment'] = function ($app) {
            return new Client($app);
        };
    }
}
