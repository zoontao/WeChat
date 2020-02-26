<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MicroMerchant\MerchantConfig;

use WeChat\MicroMerchant\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author   liuml  <liumenglei0211@163.com>
 * @DateTime 2019-05-30  14:19
 */
class Client extends BaseClient
{
    /**
     * Service providers configure recommendation functions for small and micro businesses.
     *
     * @param string $subAppId
     * @param string $subscribeAppId
     * @param string $receiptAppId
     * @param string $subMchId
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setFollowConfig(string $subAppId, string $subscribeAppId, string $receiptAppId = '', string $subMchId = '')
    {
        $params = [
            'sub_appid' => $subAppId,
            'sub_mch_id' => $subMchId ?: $this->app['config']->sub_mch_id,
        ];

        if (!empty($subscribeAppId)) {
            $params['subscribe_appid'] = $subscribeAppId;
        } else {
            $params['receipt_appid'] = $receiptAppId;
        }

        return $this->safeRequest('secapi/mkt/addrecommendconf', array_merge($params, [
            'sign_type' => 'HMAC-SHA256',
            'nonce_str' => uniqid('micro'),
        ]));
    }

    /**
     * Configure the new payment directory.
     *
     * @param string $jsapiPath
     * @param string $appId
     * @param string $subMchId
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function addPath(string $jsapiPath, string $appId = '', string $subMchId = '')
    {
        return $this->addConfig([
            'appid' => $appId ?: $this->app['config']->appid,
            'sub_mch_id' => $subMchId ?: $this->app['config']->sub_mch_id,
            'jsapi_path' => $jsapiPath,
        ]);
    }

    /**
     * bind appid.
     *
     * @param string $subAppId
     * @param string $appId
     * @param string $subMchId
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function bindAppId(string $subAppId, string $appId = '', string $subMchId = '')
    {
        return $this->addConfig([
            'appid' => $appId ?: $this->app['config']->appid,
            'sub_mch_id' => $subMchId ?: $this->app['config']->sub_mch_id,
            'sub_appid' => $subAppId,
        ]);
    }

    /**
     * add sub dev config.
     *
     * @param array $params
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function addConfig(array $params)
    {
        return $this->safeRequest('secapi/mch/addsubdevconfig', $params);
    }

    /**
     * query Sub Dev Config.
     *
     * @param string $subMchId
     * @param string $appId
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getConfig(string $subMchId = '', string $appId = '')
    {
        return $this->safeRequest('secapi/mch/querysubdevconfig', [
            'sub_mch_id' => $subMchId ?: $this->app['config']->sub_mch_id,
            'appid' => $appId ?: $this->app['config']->appid,
        ]);
    }
}
