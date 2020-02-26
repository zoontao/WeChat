<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\WiFi;

use WeChat\Kernel\BaseClient;

/**
 * Class DeviceClient.
 *
 * @author her-cat <i@her-cat.com>
 */
class DeviceClient extends BaseClient
{
    /**
     * Add a password device.
     *
     * @param int    $shopId
     * @param string $ssid
     * @param string $password
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addPasswordDevice(int $shopId, string $ssid, string $password)
    {
        $data = [
            'shop_id' => $shopId,
            'ssid' => $ssid,
            'password' => $password,
        ];

        return $this->httpPostJson('bizwifi/device/add', $data);
    }

    /**
     * Add a portal device.
     *
     * @param int    $shopId
     * @param string $ssid
     * @param bool   $reset
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function addPortalDevice(int $shopId, string $ssid, bool $reset = false)
    {
        $data = [
            'shop_id' => $shopId,
            'ssid' => $ssid,
            'reset' => $reset,
        ];

        return $this->httpPostJson('bizwifi/apportal/register', $data);
    }

    /**
     * Delete device by MAC address.
     *
     * @param string $macAddress
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $macAddress)
    {
        return $this->httpPostJson('bizwifi/device/delete', ['bssid' => $macAddress]);
    }

    /**
     * Get a list of devices.
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

        return $this->httpPostJson('bizwifi/device/list', $data);
    }

    /**
     * Get a list of devices by shop ID.
     *
     * @param int $shopId
     * @param int $page
     * @param int $size
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listByShopId(int $shopId, int $page = 1, int $size = 10)
    {
        $data = [
            'shop_id' => $shopId,
            'pageindex' => $page,
            'pagesize' => $size,
        ];

        return $this->httpPostJson('bizwifi/device/list', $data);
    }
}
