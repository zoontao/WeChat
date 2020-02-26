<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\MiniProgram\Soter;

use WeChat\Kernel\BaseClient;

/**
 * Class Client.
 *
 * @author her-cat <hxhsoft@foxmail.com>
 */
class Client extends BaseClient
{
    /**
     * @param string $openid
     * @param string $json
     * @param string $signature
     *
     * @return array|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function verifySignature(string $openid, string $json, string $signature)
    {
        return $this->httpPostJson('cgi-bin/soter/verify_signature', [
            'openid' => $openid,
            'json_string' => $json,
            'json_signature' => $signature,
        ]);
    }
}
