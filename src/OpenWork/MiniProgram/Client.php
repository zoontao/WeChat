<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork\MiniProgram;

use WeChat\Kernel\BaseClient;
use WeChat\Kernel\ServiceContainer;

/**
 * Class Client.
 */
class Client extends BaseClient
{
    /**
     * Client constructor.
     *
     * @param \WeChat\Kernel\ServiceContainer $app
     */
    public function __construct(ServiceContainer $app)
    {
        parent::__construct($app, $app['suite_access_token']);
    }

    /**
     * Get session info by code.
     *
     * @param string $code
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function session(string $code)
    {
        $params = [
            'js_code' => $code,
            'grant_type' => 'authorization_code',
        ];

        return $this->httpGet('cgi-bin/service/miniprogram/jscode2session', $params);
    }
}
