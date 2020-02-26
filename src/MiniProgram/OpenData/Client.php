<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\OpenData;

use WeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author tianyong90 <412039588@qq.com>
 */
class Client extends BaseClient
{
    /**
     * @var string
     */
    protected $baseUri = 'https://api.weixin.qq.com/wxa/';

    /**
     * removeUserStorage.
     *
     * @param string $openid
     * @param string $sessionKey
     * @param array  $key
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function removeUserStorage(string $openid, string $sessionKey, array $key)
    {
        $data = ['key' => $key];
        $query = [
            'openid' => $openid,
            'sig_method' => 'hmac_sha256',
            'signature' => hash_hmac('sha256', json_encode($data), $sessionKey),
        ];

        return $this->httpPostJson('remove_user_storage', $data, $query);
    }

    /**
     * setUserStorage.
     *
     * @param string $openid
     * @param string $sessionKey
     * @param array  $kvList
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setUserStorage(string $openid, string $sessionKey, array $kvList)
    {
        $kvList = $this->formatKVLists($kvList);

        $data = ['kv_list' => $kvList];
        $query = [
            'openid' => $openid,
            'sig_method' => 'hmac_sha256',
            'signature' => hash_hmac('sha256', json_encode($data), $sessionKey),
        ];

        return $this->httpPostJson('set_user_storage', $data, $query);
    }

    /**
     * @param array $params
     *
     * @return array
     */
    protected function formatKVLists(array $params)
    {
        $formatted = [];

        foreach ($params as $name => $value) {
            $formatted[] = [
                'key' => $name,
                'value' => strval($value),
            ];
        }

        return $formatted;
    }
}
