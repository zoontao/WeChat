<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\WiFi;

use WeChat\Kernel\BaseClient;

/**
 * Class ShopClient.
 *
 * @author her-cat <i@her-cat.com>
 */
class ShopClient extends BaseClient
{
    /**
     * Get shop Wi-Fi information.
     *
     * @param int $shopId
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(int $shopId)
    {
        return $this->httpPostJson('bizwifi/shop/get', ['shop_id' => $shopId]);
    }

    /**
     * Get a list of Wi-Fi shops.
     *
     * @param int $page
     * @param int $size
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list(int $page = 1, int $size = 10)
    {
        $data = [
            'pageindex' => $page,
            'pagesize' => $size,
        ];

        return $this->httpPostJson('bizwifi/shop/list', $data);
    }

    /**
     * Update shop Wi-Fi information.
     *
     * @param int   $shopId
     * @param array $data
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(int $shopId, array $data)
    {
        $data = array_merge(['shop_id' => $shopId], $data);

        return $this->httpPostJson('bizwifi/shop/update', $data);
    }

    /**
     * Clear shop network and equipment.
     *
     * @param int         $shopId
     * @param string|null $ssid
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function clearDevice(int $shopId, string $ssid = null)
    {
        $data = [
            'shop_id' => $shopId,
        ];

        if (!is_null($ssid)) {
            $data['ssid'] = $ssid;
        }

        return $this->httpPostJson('bizwifi/shop/clean', $data);
    }
}
