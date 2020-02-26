<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Kernel\Events;

use WeChat\Kernel\AccessToken;

/**
 * Class AccessTokenRefreshed.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class AccessTokenRefreshed
{
    /**
     * @var \WeChat\Kernel\AccessToken
     */
    public $accessToken;

    /**
     * @param \WeChat\Kernel\AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }
}
