<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\TemplateMessage;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['template_message'] = function ($app) {
            return new Client($app);
        };
    }
}
