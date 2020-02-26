<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Payment\ProfitSharing;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 *
 * @author ClouderSky <clouder.flow@gmail.com>
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['profit_sharing'] = function ($app) {
            return new Client($app);
        };
    }
}
