<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\NearbyPoi;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 *
 * @author joyeekk <xygao2420@gmail.com>
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['nearby_poi'] = function ($app) {
            return new Client($app);
        };
    }
}
