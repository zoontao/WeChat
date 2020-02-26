<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork\MiniProgram;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        !isset($app['mini_program']) && $app['mini_program'] = function ($app) {
            return new Client($app);
        };
    }
}
