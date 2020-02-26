<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenPlatform\Authorizer\OfficialAccount\OAuth;

use WeChat\OpenPlatform\Application;
use Zoontao\Socialite\WeChatComponentInterface;

/**
 * Class ComponentDelegate.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class ComponentDelegate implements WeChatComponentInterface
{
    /**
     * @var \WeChat\OpenPlatform\Application
     */
    protected $app;

    /**
     * ComponentDelegate Constructor.
     *
     * @param \WeChat\OpenPlatform\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->app['config']['app_id'];
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->app['access_token']->getToken()['component_access_token'];
    }
}
