<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\OfficialAccount\Card;

use WeChat\Kernel\BaseClient;

/**
 * Class CodeClient.
 *
 * @author overtrue <i@overtrue.me>
 */
class CodeClient extends BaseClient
{
    /**
     * 导入code接口.
     *
     * @param string $cardId
     * @param array  $codes
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deposit(string $cardId, array $codes)
    {
        $params = [
            'card_id' => $cardId,
            'code' => $codes,
        ];

        return $this->httpPostJson('card/code/deposit', $params);
    }

    /**
     * 查询导入code数目.
     *
     * @param string $cardId
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDepositedCount(string $cardId)
    {
        $params = [
            'card_id' => $cardId,
        ];

        return $this->httpPostJson('card/code/getdepositcount', $params);
    }

    /**
     * 核查code接口.
     *
     * @param string $cardId
     * @param array  $codes
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function check(string $cardId, array $codes)
    {
        $params = [
            'card_id' => $cardId,
            'code' => $codes,
        ];

        return $this->httpPostJson('card/code/checkcode', $params);
    }

    /**
     * 查询 Code 接口.
     *
     * @param string $code
     * @param string $cardId
     * @param bool   $checkConsume
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $code, string $cardId = '', bool $checkConsume = true)
    {
        $params = [
            'code' => $code,
            'check_consume' => $checkConsume,
            'card_id' => $cardId,
        ];

        return $this->httpPostJson('card/code/get', $params);
    }

    /**
     * 更改Code接口.
     *
     * @param string $code
     * @param string $newCode
     * @param string $cardId
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(string $code, string $newCode, string $cardId = '')
    {
        $params = [
            'code' => $code,
            'new_code' => $newCode,
            'card_id' => $cardId,
        ];

        return $this->httpPostJson('card/code/update', $params);
    }

    /**
     * 设置卡券失效.
     *
     * @param string $code
     * @param string $cardId
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function disable(string $code, string $cardId = '')
    {
        $params = [
            'code' => $code,
            'card_id' => $cardId,
        ];

        return $this->httpPostJson('card/code/unavailable', $params);
    }

    /**
     * 核销 Code 接口.
     *
     * @param string      $code
     * @param string|null $cardId
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function consume(string $code, string $cardId = null)
    {
        $params = [
            'code' => $code,
        ];

        if (!is_null($cardId)) {
            $params['card_id'] = $cardId;
        }

        return $this->httpPostJson('card/code/consume', $params);
    }

    /**
     * Code解码接口.
     *
     * @param string $encryptedCode
     *
     * @return mixed
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function decrypt(string $encryptedCode)
    {
        $params = [
            'encrypt_code' => $encryptedCode,
        ];

        return $this->httpPostJson('card/code/decrypt', $params);
    }
}
