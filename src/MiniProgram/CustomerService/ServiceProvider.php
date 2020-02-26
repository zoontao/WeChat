<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\CustomerService;

use WeChat\OfficialAccount\CustomerService\Client;
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
        $app['customer_service'] = function ($app) {
            return new Client($app);
        };
    }
}
