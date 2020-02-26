<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Payment\Merchant;

use WeChat\Payment\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author mingyoung <mingyoungcheung@gmail.com>
 */
class Client extends BaseClient
{
    /**
     * Add sub-merchant.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function addSubMerchant(array $params)
    {
        return $this->manage($params, ['action' => 'add']);
    }

    /**
     * Query sub-merchant by merchant id.
     *
     * @param string $id
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function querySubMerchantByMerchantId(string $id)
    {
        $params = [
            'micro_mch_id' => $id,
        ];

        return $this->manage($params, ['action' => 'query']);
    }

    /**
     * Query sub-merchant by wechat id.
     *
     * @param string $id
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function querySubMerchantByWeChatId(string $id)
    {
        $params = [
            'recipient_wechatid' => $id,
        ];

        return $this->manage($params, ['action' => 'query']);
    }

    /**
     * @param array $params
     * @param array $query
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function manage(array $params, array $query)
    {
        $params = array_merge($params, [
            'appid' => $this->app['config']->app_id,
            'nonce_str' => '',
            'sub_mch_id' => '',
            'sub_appid' => '',
        ]);

        return $this->safeRequest('secapi/mch/submchmanage', $params, 'post', compact('query'));
    }
}
