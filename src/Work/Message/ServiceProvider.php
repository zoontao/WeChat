<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\Message;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['message'] = function ($app) {
            return new Client($app);
        };

        $app['messenger'] = function ($app) {
            $messenger = new Messenger($app['message']);

            if (is_int($app['config']['agent_id'])) {
                $messenger->ofAgent($app['config']['agent_id']);
            }

            return $messenger;
        };
    }
}
