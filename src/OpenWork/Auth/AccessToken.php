<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenWork\Auth;

use  WeChat\Kernel\AccessToken as BaseAccessToken;

/**
 * AccessToken.
 *
 * @author xiaomin <keacefull@gmail.com>
 */
class AccessToken extends BaseAccessToken
{
    protected $requestMethod = 'POST';

    /**
     * @var string
     */
    protected $endpointToGetToken = 'cgi-bin/service/get_provider_token';

    /**
     * @var string
     */
    protected $tokenKey = 'provider_access_token';

    /**
     * @var string
     */
    protected $cachePrefix = 'wechat.kernel.provider_access_token.';

    /**
     * Credential for get token.
     *
     * @return array
     */
    protected function getCredentials(): array
    {
        return [
            'corpid' => $this->app['config']['corp_id'], //服务商的corpid
            'provider_secret' => $this->app['config']['secret'],
        ];
    }
}
