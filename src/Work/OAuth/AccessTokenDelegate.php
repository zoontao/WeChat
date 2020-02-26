<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\OAuth;

use WeChat\Work\Application;
use Zoontao\Socialite\AccessTokenInterface;

/**
 * Class AccessTokenDelegate.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class AccessTokenDelegate implements AccessTokenInterface
{
    /**
     * @var \WeChat\Work\Application
     */
    protected $app;

    /**
     * @param \WeChat\Work\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Return the access token string.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->app['access_token']->getToken()['access_token'];
    }
}
