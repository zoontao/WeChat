<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Work\MiniProgram;

use WeChat\MiniProgram\Application as MiniProgram;
use WeChat\Work\Auth\AccessToken;
use WeChat\Work\MiniProgram\Auth\Client;

/**
 * Class Application.
 *
 * @author Caikeal <caikeal@qq.com>
 *
 * @property \WeChat\Work\MiniProgram\Auth\Client $auth
 */
class Application extends MiniProgram
{
    /**
     * Application constructor.
     *
     * @param array $config
     * @param array $prepends
     */
    public function __construct(array $config = [], array $prepends = [])
    {
        parent::__construct($config, $prepends + [
            'access_token' => function ($app) {
                return new AccessToken($app);
            },
            'auth' => function ($app) {
                return new Client($app);
            },
        ]);
    }
}
