<?php

/*
 * This file is part of the overtrue/wechat.

 */

namespace WeChat\Payment\Fundflow;

use WeChat\Kernel\Http\StreamResponse;
use WeChat\Payment\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * Download fundflow history as a table file.
     *
     * @param string $date
     * @param string $type
     * @param array  $options
     *
     * @return array|\WeChat\Kernel\Http\Response|\WeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \WeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \WeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $date, string $type = 'Basic', $options = [])
    {
        $params = [
            'appid' => $this->app['config']->app_id,
            'bill_date' => $date,
            'account_type' => $type,
            'sign_type' => 'HMAC-SHA256',
            'nonce_str' => uniqid('micro'),
        ];
        $options = array_merge(
            [
                'cert' => $this->app['config']->get('cert_path'),
                'ssl_key' => $this->app['config']->get('key_path'),
            ],
            $options
        );
        $response = $this->requestRaw('pay/downloadfundflow', $params, 'post', $options);

        if (0 === strpos($response->getBody()->getContents(), '<xml>')) {
            return $this->castResponseToType($response, $this->app['config']->get('response_type'));
        }

        return StreamResponse::buildFromPsrResponse($response);
    }
}
