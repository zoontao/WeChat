<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\ShakeAround;

use WeChat\Kernel\BaseClient;

/**
 * Class DeviceClient.
 *
 * @author allen05ren <allen05ren@outlook.com>
 */
class DeviceClient extends BaseClient
{
    /**
     * @param array $data
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apply(array $data)
    {
        return $this->httpPostJson('shakearound/device/applyid', $data);
    }

    /**
     * Get audit status.
     *
     * @param int $applyId
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function status(int $applyId)
    {
        $params = [
            'apply_id' => $applyId,
        ];

        return $this->httpPostJson('shakearound/device/applystatus', $params);
    }

    /**
     * Update a device comment.
     *
     * @param array  $deviceIdentifier
     * @param string $comment
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(array $deviceIdentifier, string $comment)
    {
        $params = [
            'device_identifier' => $deviceIdentifier,
            'comment' => $comment,
        ];

        return $this->httpPostJson('shakearound/device/update', $params);
    }

    /**
     * Bind location for device.
     *
     * @param array $deviceIdentifier
     * @param int   $poiId
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function bindPoi(array $deviceIdentifier, int $poiId)
    {
        $params = [
            'device_identifier' => $deviceIdentifier,
            'poi_id' => $poiId,
        ];

        return $this->httpPostJson('shakearound/device/bindlocation', $params);
    }

    /**
     * @param array  $deviceIdentifier
     * @param int    $poiId
     * @param string $appId
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function bindThirdPoi(array $deviceIdentifier, int $poiId, string $appId)
    {
        $params = [
            'device_identifier' => $deviceIdentifier,
            'poi_id' => $poiId,
            'type' => 2,
            'poi_appid' => $appId,
        ];

        return $this->httpPostJson('shakearound/device/bindlocation', $params);
    }

    /**
     * Fetch batch of devices by deviceIds.
     *
     * @param array $deviceIdentifiers
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function listByIds(array $deviceIdentifiers)
    {
        $params = [
            'type' => 1,
            'device_identifiers' => $deviceIdentifiers,
        ];

        return $this->search($params);
    }

    /**
     * Pagination to get batch of devices.
     *
     * @param int $lastId
     * @param int $count
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function list(int $lastId, int $count)
    {
        $params = [
            'type' => 2,
            'last_seen' => $lastId,
            'count' => $count,
        ];

        return $this->search($params);
    }

    /**
     * Fetch batch of devices by applyId.
     *
     * @param int $applyId
     * @param int $lastId
     * @param int $count
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     */
    public function listByApplyId(int $applyId, int $lastId, int $count)
    {
        $params = [
            'type' => 3,
            'apply_id' => $applyId,
            'last_seen' => $lastId,
            'count' => $count,
        ];

        return $this->search($params);
    }

    /**
     * Fetch batch of devices.
     *
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface|\WeChat\Kernel\Support\Collection|array|object|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function search(array $params)
    {
        return $this->httpPostJson('shakearound/device/search', $params);
    }
}
