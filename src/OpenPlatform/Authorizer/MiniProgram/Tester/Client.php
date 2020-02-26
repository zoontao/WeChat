<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OpenPlatform\Authorizer\MiniProgram\Tester;

use WeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author caikeal <caiyuezhang@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * 绑定小程序体验者.
     *
     * @param string $wechatId
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function bind(string $wechatId)
    {
        return $this->httpPostJson('wxa/bind_tester', [
            'wechatid' => $wechatId,
        ]);
    }

    /**
     * 解绑小程序体验者.
     *
     * @param string $wechatId
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function unbind(string $wechatId)
    {
        return $this->httpPostJson('wxa/unbind_tester', [
            'wechatid' => $wechatId,
        ]);
    }

    /**
     * 获取体验者列表.
     *
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list()
    {
        return $this->httpPostJson('wxa/memberauth', [
            'action' => 'get_experiencer',
        ]);
    }
}
