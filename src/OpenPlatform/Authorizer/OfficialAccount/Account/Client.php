<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenPlatform\Authorizer\OfficialAccount\Account;

use WeChat\Kernel\ServiceContainer;
use WeChat\OpenPlatform\Application;
use WeChat\OpenPlatform\Authorizer\Aggregate\Account\Client as BaseClient;

/**
 * Class Client.
 *
 * @author Keal <caiyuezhang@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * @var \WeChat\OpenPlatform\Application
     */
    protected $component;

    /**
     * Client constructor.
     *
     * @param \WeChat\Kernel\ServiceContainer  $app
     * @param \WeChat\OpenPlatform\Application $component
     */
    public function __construct(ServiceContainer $app, Application $component)
    {
        parent::__construct($app);

        $this->component = $component;
    }

    /**
     * 从第三方平台跳转至微信公众平台授权注册页面, 授权注册小程序.
     *
     * @param string $callbackUrl
     * @param bool   $copyWxVerify
     *
     * @return string
     */
    public function getFastRegistrationUrl(string $callbackUrl, bool $copyWxVerify = true): string
    {
        $queries = [
            'copy_wx_verify' => $copyWxVerify,
            'component_appid' => $this->component['config']['app_id'],
            'appid' => $this->app['config']['app_id'],
            'redirect_uri' => $callbackUrl,
        ];

        return 'https://mp.weixin.qq.com/cgi-bin/fastregisterauth?'.http_build_query($queries);
    }

    /**
     * 小程序快速注册.
     *
     * @param string $ticket
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function register(string $ticket)
    {
        $params = [
            'ticket' => $ticket,
        ];

        return $this->httpPostJson('cgi-bin/account/fastregister', $params);
    }
}
