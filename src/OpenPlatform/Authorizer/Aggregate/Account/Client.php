<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenPlatform\Authorizer\Aggregate\Account;

use WeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author Scholer <scholer_l@live.com>
 */
class Client extends BaseClient
{
    /**
     * 创建开放平台帐号并绑定公众号/小程序.
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create()
    {
        $params = [
            'appid' => $this->app['config']['app_id'],
        ];

        return $this->httpPostJson('cgi-bin/open/create', $params);
    }

    /**
     * 将公众号/小程序绑定到开放平台帐号下.
     *
     * @param string $openAppId 开放平台帐号appid
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function bindTo(string $openAppId)
    {
        $params = [
            'appid' => $this->app['config']['app_id'],
            'open_appid' => $openAppId,
        ];

        return $this->httpPostJson('cgi-bin/open/bind', $params);
    }

    /**
     * 将公众号/小程序从开放平台帐号下解绑.
     *
     * @param string $openAppId 开放平台帐号appid
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function unbindFrom(string $openAppId)
    {
        $params = [
            'appid' => $this->app['config']['app_id'],
            'open_appid' => $openAppId,
        ];

        return $this->httpPostJson('cgi-bin/open/unbind', $params);
    }

    /**
     * 获取公众号/小程序所绑定的开放平台帐号.
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBinding()
    {
        $params = [
            'appid' => $this->app['config']['app_id'],
        ];

        return $this->httpPostJson('cgi-bin/open/get', $params);
    }
}
